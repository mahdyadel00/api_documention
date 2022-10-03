<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Documentation;
use App\Models\GeneralSettings;
use App\Models\Offer;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Product;
use App\Models\PaymentInfo;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\SubmittedOrder;
use Illuminate\Support\Facades\Hash;
use Mail;
use Auth;
use Image;
use Validator;


class UserController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function rate_action(Request $request)
    {
        $this->validate($request, [
            'stars' => 'required|integer|min:1|max:5',
            'lessor_id' => 'required|integer|exists:users,id',
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        $data = [
            'stars' => $request->stars,
            'comment' => $request->comment
        ];
        $rate = Rate::updateOrCreate(
            [
                "user_id" => Auth::user()->id,
                'model' => $request->model,
                'model_id' => $request->model_id
            ],
            $data
        );

        if ($rate) {
            $response = [
                'status' => true,
                'message' => "The vote was successful!"
            ];
            return response()->json($response, 200);
        }
    }

    public function documentation(Request $request)
    {

        $this->validate($request, [
            'id_number' => 'required',
            'id_expire_date' => 'required',
            'id_create_date' => 'required',
            'full_name_en' => 'required',
            'full_name_ar' => 'required',
            'nationality' => 'required',
            'birth_day' => 'required',
            'gender' => 'required',
        ]);

        try {
            $data = [
                'id_number' => $request->id_number,
                'id_expire_date' => \Carbon\Carbon::parse($request->id_expire_date)->toDateString(),
                'id_create_date' => \Carbon\Carbon::parse($request->id_create_date)->toDateString(),
                'full_name_en' => $request->full_name_en,
                'full_name_ar' => $request->full_name_ar,
                'nationality' => $request->nationality,
                'gender' => $request->gender,
                'birth_day' => \Carbon\Carbon::parse($request->birth_day)->toDateString(),
            ];

            // return $data;

            if ($request->id_image) {
                $image = $request->id_image;
                $extension = $image->extension();
                $imageName = time() . rand(1000, 9999) . '.' . $extension;

                $ImageUpload = Image::make($image);
                $originalPath = public_path('uploads');
                $ImageUpload->save($originalPath . "/" . $imageName);
                $data['id_image'] = $imageName;
            }

            Documentation::updateOrCreate([
                "user_id" => Auth::user()->id
            ], $data);

              // mo2men@mail
              $title = 'New Documentation' . ' ' . $request->full_name_ar;
              // $body = $request->body;
              $content = 'id_number: ' . $request->id_number . '<br>';
              $content .= 'id_expire_date: ' . \Carbon\Carbon::parse($request->id_expire_date)->toDateString(). '<br>';
              $content .= 'id_create_date: ' . \Carbon\Carbon::parse($request->id_create_date)->toDateString(). '<br>';
              $content .= 'full_name_en: ' . $request->full_name_en. '<br>';
              $content .= 'full_name_ar: ' . $request->full_name_ar. '<br>';
              $content .= 'nationality: ' . $request->nationality. '<br>';
              $content .= 'gender: ' . $request->gender. '<br>';
              $content .= 'birth_day: ' . \Carbon\Carbon::parse($request->birth_day)->toDateString(). '<br>';
  
              \Mail::send('email.template', ['content' => $content], function ($message)  use ($title) {
                  $subject = $title;
                  $message->to('Ejarly.app@gmail.com')->subject($subject);
              });
              // endEdit@mail

            $user = User::with('documentation')->find(Auth::user()->id);
            $user->is_documented = 2;
            $user->save();
        } catch (Exception $e) {
            $error_log = new ErrorLog;
            $error_log->type = "doc";
            $error_log->input_request = json_encode($request->all());
            $error_log->message = $e->getMessage();
            $error_log->error = json_encode($e);
            $error_log->save();
        }

        $response = [
            'status' => true,
            'user' => $user,
            'message' => "The Request of Documentation was sent successful!"
        ];
        return response()->json($response, 200);
    }





    public function user_orders_and_products($id)
    {

        // $user = User::with(['orders', 'orders.products'])->with(['submittedOrders', 'submittedOrders.user', 'submittedOrders.job', 'submittedOrders.offers', 'submittedOrders.offers.product'], function ($query) {
        //     $query->where('is_blocked', 0)->where('is_active', 1)->where('is_deleted', 0);
        // })->find($id);    
         $user = User::with(['orders', 'orders.products'])->with(['submittedOrders' => function ($query) {
           $query->where('is_blocked', 0)->where('is_active', 1)->where('is_deleted', 0);
           $query->with(['user', 'job', 'offers', 'offers.product']);
        }])->find($id);
        $user->products = Product::latest()->where('user_id', $id)->with(['photos', 'city'])->where('is_deleted', 0)->where('is_active', 1)->where('is_blocked', 0)->orderBy('id', 'ASC')->get();

        return $user;
    }

    public function forget_password(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
        );


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();

            foreach ($error as $er) {
                $error_msg[] = array($er);
            }
            return ['status' => false, 'message' => $error_msg['0']['0']['0']];
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->verification_code_email = rand(1000, 9999);
            $user->save();

            Mail::send('email.reset_password', ['user' => $user], function ($message)  use ($user) {
                $subject = "Ejarly: Code Verification to change password";
                $message->to($user->email)->subject($subject);
            });

            return response()->json([
                'message' => "Code sent to email",
                'status' => true
            ]);
        }
        return ['status' => false, 'message' => 'User Not Found !'];
    }

    public function code_verfication(Request $request)
    {
        $rules = array(
            'code' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();

            foreach ($error as $er) {
                $error_msg[] = array($er);
            }
            return ['status' => false, 'message' => $error_msg['0']['0']['0']];
        }

        $user = User::where('verification_code_email', $request->code)->first();
        if ($user) {
            return response()->json([
                'message' => "code is valid Successfully",
                'code' => $request->code,
                'status' => true
            ]);
        }
        return ['status' => false, 'message' => 'Invalid Code !'];
    }

    public function forget_password_action(Request $request)
    {
        $rules = array(
            'code' => 'required',
            'password' => 'required|confirmed',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();

            foreach ($error as $er) {
                $error_msg[] = array($er);
            }
            return ['status' => false, 'message' => $error_msg['0']['0']['0']];
        }

        $user = User::where('verification_code_email', $request->code)->first();
        if ($user) {
            $user->verification_code_email = "";
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([
                'message' => "Password Changed Successfully",
                'status' => true
            ]);
        }
        return ['status' => false, 'message' => 'Invalid Code !'];
    }

    public function change_password(Request $request)
    {
        $rules = array(
            'old_password' => 'required',
            'password' => 'required|confirmed',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();

            foreach ($error as $er) {
                $error_msg[] = array($er);
            }
            return ['status' => false, 'message' => $error_msg['0']['0']['0']];
        }

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return ['status' => false, 'message' => "old password not matched!"];
        }

        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'message' => "Password Changed Successfully",
            'status' => true
        ]);
    }

    public function online_status(Request $request)
    {

        $user = auth()->user();
        $user->is_online = $request->is_online;
        $user->save();

        return ['status' => true];
    }

 /**
     * @OA\Get(
     *     path="/api/user/transactions",
     *     tags={"User Transactions"},
     *     summary="Get All User Transactions Rest Api Documention",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="transactions",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */


    public function transactions()
    {
        $user_id = auth()->user()->id;
        $statues_ids = OrderStatus::where('is_rent', 1)->pluck('id')->toArray();
        $products = Product::where('user_id', $user_id)->count();
        $my_orders = Order::where('status_id', '!=', 1)->where('owner_id', $user_id)->count();
        $renter_orders = Order::where('owner_id', $user_id)->whereNotIn('status_id', [1, 10])->whereIn('status_id', $statues_ids)->count();
        $finished_orders = Order::where('status_id', 10)->where(function ($q) use ($user_id) {
            $q->where('owner_id', $user_id);
        })->count();
        $rejected_orders = Order::where(function ($q) use ($user_id) {
            $q->where('status_id', 12);
            $q->orWhere('status_id', 11);
        })->where(function ($q) use ($user_id) {
            $q->where('owner_id', $user_id);
        })->count();

        $rented_orders = Order::where('status_id', '!=', 1)->where('user_id', $user_id)->count();
        $finished_rented_orders = Order::where('status_id', 10)->where(function ($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->count();
        $renter_rented_orders = Order::where('user_id', $user_id)->whereNotIn('status_id', [1, 10])->whereIn('status_id', $statues_ids)->count();
        $rejected_rented_orders = Order::where(function ($q) use ($user_id) {
            $q->where('status_id', 12);
            $q->orWhere('status_id', 11);
        })->where(function ($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->count();
        $submitted_orders = SubmittedOrder::where('user_id', $user_id)->get();
        // return $submitted_orders->pluck('id');
        // return $submitted_orders->count();
        $offers = Offer::with('submitted_order')->whereIn('submitted_order_id', $submitted_orders->pluck('id'))->count();
        // return  $offers;

        $total = Order::where('owner_id', $user_id)->sum('total');
        $owner_total = Order::where('owner_id', $user_id)->sum('owner_total');
        // $applicatin_total = (Order::where('owner_id', $user_id)->sum('application_amount') + Order::where('owner_id', $user_id)->sum('tax_amount') + Order::where('owner_id', $user_id)->sum('service_fees'));
        $applicatin_total = auth()->user()->recover;
        $max_amount = auth()->user()->max_amount > 0 ? auth()->user()->max_amount : GeneralSettings::first()->max_amount;

        return [
            'status' => true,
            'products' => $products,
            'my_orders' => $my_orders,
            'finished_orders' => $finished_orders,
            'renter_orders' => $renter_orders,
            'rejected_orders' => $rejected_orders,
            'rented_orders' => $rented_orders,
            'finished_rented_orders' => $finished_rented_orders,
            'renter_rented_orders' => $renter_rented_orders,
            'rejected_rented_orders' => $rejected_rented_orders,
            'submitted_orders' => $submitted_orders->count(),
            'offers' => $offers,
            'total' => number_format($total, 2),
            'owner_total' =>  number_format($owner_total, 2),
            'applicatin_total' => number_format($applicatin_total, 2),
            'max_amount' => number_format($max_amount, 2),
        ];
    }




    public function paymnetInfo(Request $request)
    {


        // return $paymentInformation;
        $data = [
            'country' => 'string',
            'bank_name' => 'string',
            'personal_name' => 'string',
            'account_number' => 'string',
            'iban' => 'string',
        ];

        $validator = Validator::make($request->all(), $data);
        // var_dump($request->all());
        // exit;

        $paymentInformation = PaymentInfo::where('user_id', auth()->user()->id)->first();

        if (!$paymentInformation)
            $paymentInformation = new PaymentInfo;
        // if()


        $paymentInformation->user_id = auth()->user()->id;
        $paymentInformation->country = $request->input('country');
        $paymentInformation->bank_name = $request->input('bank_name');
        $paymentInformation->personal_name = $request->input('personal_name');
        $paymentInformation->account_number = $request->input('account_number');
        $paymentInformation->iban = $request->input('iban');


        $paymentInformation->save();

        return response()->json($paymentInformation, 200);
    }
}
