<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use App\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\WalletLog;
use App\Models\Reviews;
use App\Models\PaymentLog;
use Illuminate\Support\Facades\Hash;
use Image;
use Auth;
use Session;
use App\Repositories\TransactionRepository;
use App\Models\Documentation;
use App\Models\SubmittedOrder;
use App\Repositories\FcmRepository;

class UserController extends BackendController
{

    public function __construct(FcmRepository $fcmRepo)
    {
        parent::__construct();
        $this->fcmRepo = $fcmRepo;

    }

    public function index(Request $request)
    {
        if ($request->level == 'otp') {
            $this->data['title'] = "Users OTP Level";
             // mo2men@dataTable
            $this->data['users'] = User::where('role_id', 3)->whereNull('email')->with('reports')->orderBy('id', 'ASC')->paginate(10);
        } else {
            $this->data['title'] = "Users";
            $this->data['users'] = User::where('role_id', 3)->whereNotNull('email')->with('reports')->orderBy('id', 'ASC')->get();
             // endEdit@dataTable
        }

        foreach ($this->data['users'] as $key => $user) {
            $count_star = Reviews::where('user_id', $user->id)->count('id');
            $sum_star = Reviews::where('user_id', $user->id)->sum('star_user');
            if ($count_star)
                $prossecstar = $sum_star / $count_star;
            else
                $prossecstar = 0;

            $this->data['users'][$key]->stars =  round($prossecstar);
        }

        return view('admin.user.index', $this->data);
    }




    public function contact(){
        $this->data['rows'] = \DB::table('contact')->get();
        $this->data['title'] = "Contact us";

        return view('admin.user.contact', $this->data);

        // dd($rows);
    }



    // 20200222
    public function before_launch()
    {
        $this->data['title'] = "Users Before Launch";
        $this->data['users'] = User::where([['role_id', '=', 3], ['before_launch', '=', '1']])->orderBy('id', 'ASC')->paginate(10);
        return view('admin.user.index', $this->data);
    }
    // 20200222

    public function add()
    {
        $this->data['title'] = "Add New User";
        return view('admin.user.add', $this->data);
    }

    public function store(Request $request)
    {

        $this->validate($request, array(
            'name'      => 'required|unique:users|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ));

        try {

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->role_id = 2;

            $user->save();


            Session::flash('success', 'User has been created successfully!');

            return redirect()->route('admin.users');
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return back();
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->data['title'] = $user->name;
        $this->data['user'] = $user;
        if ($user->documentation) {
            $user->documentation->update([
                'seen' => 1
            ]);
        }
        return view('admin.user.edit', $this->data);
    }

    public function update(Request $request, $id)
    {


        $this->validate($request, array(
            'name'      => 'required|min:3',
            'email' => 'required|string|email|max:255',
            // 'cash_back_percentage' => 'numeric',
        ));

        try {
            
            $user =  User::findOrFail($id);
            // dd($user->documentation);


            if($user->status != $request->status){


                $fcm_request_user = new \stdClass;
                $fcm_request_user->title = 'حسابك';
                $fcm_request_user->body = 'تم تغير حالة حسابك';
                $fcm_request_user->user_id = $id;
                $this->fcmRepo->run($fcm_request_user, 'sound');


                \DB::table('oauth_access_tokens')->where('user_id', $id)->delete();
            }


            $user->name = $request->name;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->cash_back_percentage = $request->cash_back_percentage;
            $user->application_percentage = $request->application_percentage;
            $user->tax_percentage = $request->tax_percentage;
            $user->membership = $request->membership;
            $user->max_amount = $request->max_amount;


            if ($request->password != "") {
                $this->validate($request, array(
                    'password' => 'required|string|min:8|confirmed',
                ));
                $user->password =  Hash::make($request->password);
            }

            $user->save();

            Session::flash('success', 'User has been updated successfully!');

            return redirect()->route('admin.users');
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return back();
        }
    }

    public function delete($id)
    {
        User::destroy($id);
        Session::flash('success', 'User has been deleted successfully!');
        return response()->json(['delete' => true]);
    }

    public function settings()
    {
        $this->data['title'] = "Settings";
        $this->data['general_setting'] = GeneralSettings::find(1);
        return view('admin.user.settings', $this->data);
    }

    public function cash_back_percentage_update(Request $request)
    {
        $this->validate($request, array(
            'cash_back_percentage' => 'required|numeric',
            'application_percentage' => 'required|numeric',
            'tax_percentage' => 'required|numeric',
            'service_fees' => 'required|numeric',
        ));

        $general_settings = GeneralSettings::find(1);
        $general_settings->cash_back_percentage = $request->cash_back_percentage;
        $general_settings->application_percentage = $request->application_percentage;
        $general_settings->tax_percentage = $request->tax_percentage;
        $general_settings->service_fees = $request->service_fees;
        $general_settings->max_amount = $request->max_amount;
        $general_settings->save();

        Session::flash('success', 'The Settings Updated successfully!');
        return redirect()->back();
    }

    public function documentation_requests()
    {
        $this->data['title'] = "Documentation Requests";
        $this->data['users'] = User::where('role_id', 3)->where('is_documented', 1)->orderBy('id', 'ASC')->paginate(10);
        return view('admin.user.documentation_requests', $this->data);
    }

    public function documentation_details($user_id)
    {
        $this->data['title'] = "documentation details";
        $this->data['user'] = User::find($user_id);
        return view('admin.user.documentation_details', $this->data);
    }

    public function approve_documentation($user_id, Request $request)
    {
        // dd('test');
        $user = User::find($user_id);
        $user->is_documented = 1;
        $user->save();


        $fcm_request_user = new \stdClass;
        $fcm_request_user->title = 'حسابك';
        $fcm_request_user->body = 'تم توثيق حسابك بنجاح';
        $fcm_request_user->user_id = $user_id;
        $this->fcmRepo->run($fcm_request_user, 'sound');


        \DB::table('oauth_access_tokens')->where('user_id',$request->user_id)->delete();

        Session::flash('success', "The Documentation was successful!");
        return redirect()->route('admin.users');
    }

    public function products($user_id)
    {
        $user = User::find($user_id);
        $this->data['title'] = "Products (" . $user->name . ")";
        $this->data['products'] = Product::where('user_id', $user_id)->latest()->paginate(15);
        return view('admin.product.index', $this->data);
    }

    public function submittedorders(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $this->data['title'] = "Submitted Order (" . $user->name . ")";
        $submittedOrders = SubmittedOrder::where('user_id', $user_id)->latest()->with('messages');
        $this->data['submittedOrders'] = $submittedOrders->paginate(15);
        return view('admin.submitted_order.index', $this->data);

    } 
    
    public function orders(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $this->data['title'] = "Orders (" . $user->name . ")";
        if ($request->type == 'tenant')
        $this->data['orders'] = Order::where('user_id', $user_id)->latest()->paginate(15);
        if ($request->type == 'rented')
            $this->data['orders'] = Order::where('owner_id', $user_id)->latest()->paginate(15);

        $this->data['satuses'] = OrderStatus::get();
        return view('admin.orders.index', $this->data);
    }

    public function wallet($user_id)
    {
        // dd("");
        $user = User::find($user_id);
        $this->data['title'] = "Wallet (" . $user->name . ")";
        $this->data['wallet_logs'] = WalletLog::where('user_id', $user_id)->where('approved', 1)->latest()->paginate(15);
        return view('admin.user.wallet', $this->data);
    }

    public function transacions($user_id, TransactionRepository $transaction)
    {

        // dd($transaction);
        $this->data['user_details'] = $user = User::find($user_id);
        $this->data['max_amount'] = GeneralSettings::first()->max_amount;
        $this->data['title'] = "Transactions (" . $user->name . ")";
        $this->data['wallet_logs'] = $transaction->wallet_logs($user_id);
        $this->data['payment_logs'] = $transaction->payment_logs($user_id);
        $this->data['debts'] = $transaction->return_debts($user_id);
        $this->data['pending_transactions'] = $transaction->pending_transactions($user_id);
        return view('admin.user.transactions', $this->data);
    }

    public function action($id, Request $request)
    {



        if ($request->type == 'debts' || $request->type == 'recover' || $request->type == 'deposit') {
            $user = User::find($id);
            // dd($user->balance());
            if ($request->type == 'debts' || $request->type == 'deposit') {

                $user_id = $id;
                $from_id = auth()->guard('admin')->user()->id;
                $wallet_log = new WalletLog;
                $wallet_log->order_id = 0;
                $wallet_log->user_id = $user_id;
                $wallet_log->from_id = $from_id;
                $wallet_log->payment_method = "from_admin";
                $wallet_log->approved = 1;

                if ($request->type == 'debts') {
                    $wallet_log->type = "debts";
                    if ($user->balance() >= $request->amount) {
                        $wallet_log->amount = $request->amount;
                        $wallet_log->save();
                    } elseif ($user->balance() > 0) {

                        $wallet_log->amount = $user->balance();
                        $amount = $request->amount - $user->balance();

                        $wallet_log->save();

                        $user->recover += $amount;
                        $user->save();
                        // dd($user->recover, $amount);
                    } else {
                        $user->recover += $request->amount;
                        $user->save();
                    }
                } elseif ($request->type == 'deposit') {
                    $wallet_log->type = "deposit";
                    if ($user->recover == 0) {
                        $wallet_log->amount = $request->amount;
                        $wallet_log->save();
                    } elseif ($request->amount > $user->recover) {
                        $wallet_log->amount = $request->amount - $user->recover;
                        $wallet_log->save();
                        $user->recover = 0;
                        $user->save();
                    } elseif ($request->amount < $user->recover) {
                        $wallet_log->amount = $user->recover - $request->amount;
                        // $wallet_log->save();
                        $user->recover = $wallet_log->amount;
                        $user->save();
                    }
                }
            } else {
                $user->recover -= $request->amount;
                $user->save();
            }

            // dd($user->recover);

            // $user->save();
        } else {
            $user_id = $id;
            $from_id = auth()->guard('admin')->user()->id;
            $wallet_log = new WalletLog;
            $wallet_log->order_id = 0;
            $wallet_log->user_id = $user_id;
            $wallet_log->from_id = $from_id;
            $wallet_log->amount = $request->amount;
            $wallet_log->payment_method = "from_admin";
            $wallet_log->approved = 1;
            $wallet_log->type = $request->type;
            $wallet_log->save();

            // $user = User::find($id);
            // switch ($request->type) {
            //     case 'recover':
            //         $user->recover -= $request->amount;
            //         break;
            //     default:
            //         $user->recover += $request->amount;
            //         break;
            // }
            // $user->save();


        }



        Session::flash('success', "Transaction Successfully");
        return back();
    }
    public function approve($id, Request $request)
    {
        $wallet_log = WalletLog::find($request->wallet_id);
        $wallet_log->approved = 1;
        $wallet_log->save();

        Session::flash('success', "Transaction Successfully");
        return back();
    }

    public function order_details(Request $request)
    {

        $order = Order::find($request->id);
        $title = "Order #" . $order->id;

        return ['status' => true, 'render_data' => view("admin.user.order_details", ['order' => $order, 'title' => $title])->render()];
    }

    public function order_details2(Request $request)
    {

        $order = Order::find($request->id);
        $title = "Order #" . $order->id;

        return view("admin.orders.order_tpl", ['order' => $order, 'title' => $title]);;
    }



    // <!-- @midoshriks@documentations -->
    public function user_documentations(Request $request, $user_id)
    {

        $this->data['title'] = "Documentations user";
        // $this->data['user'] = user::all();

        // return $this->data['documentations'];
        $this->data['documentations'] = Documentation::where('user_id', $user_id)->with(['user'])->get();

        return view('admin.user.documentations', $this->data);
    }
    // <!-- @endEdit -->

    // @midoshriks@active-email
    public function active_email($id)
    {
        $verified = 1;
        $none = 0;
        $user = User::find($id);
        // $user->email_verified = $test;

        if ($user->email_verified == 0) {
            $user->email_verified = $verified;
            $body = 'تم إزالة البريد الإلكتروني بنجاح';

        } elseif ($user->email_verified == 1) {
            $user->email_verified = $none;
            $body = 'تم توثيق البريد الإلكتروني بنجاح';
        }

        $user->save();



        $fcm_request_user = new \stdClass;
        $fcm_request_user->title = 'البريد الإلكتروني';
        $fcm_request_user->body = $body;
        $fcm_request_user->user_id = $id;
        $this->fcmRepo->run($fcm_request_user, 'sound');

        \DB::table('oauth_access_tokens')->where('user_id', $id)->delete();
        // var_dump($user->name);
        // exit;
        if ($user->email_verified == 1) {
            $msg = 'User has been active email successfully!';
        } else {
            $msg = 'User has been deactive email successfully!';
        }

        Session::flash('success', $msg);
        return response()->json(['email_verified' => $user->email_verified]);
    }
    // @endEdit

    // @midoshriks@active-phone
    public function active_phone($id)
    {
        $verified = 1;
        $none = 0;
        $user = User::find($id);
        // $user->phone_verified = $test;

        if ($user->phone_verified == 0) {
            $user->phone_verified = $verified;
            $body = 'تم إزالة جوالك بنجاح';
        } elseif ($user->phone_verified == 1) {
            $user->phone_verified = $none;
            $body = 'تم توثيق جوالك بنجاح';
        }

        $user->save();


        $fcm_request_user = new \stdClass;
        $fcm_request_user->title = 'الجوال';
        $fcm_request_user->body = $body;
        $fcm_request_user->user_id = $id;
        $this->fcmRepo->run($fcm_request_user, 'sound');

        \DB::table('oauth_access_tokens')->where('user_id', $id)->delete();

        // var_dump($user->name);
        // exit;
        // phone_verified

        if ($user->phone_verified == 1) {
            $msg = 'User has been active phone successfully!';
        } else {
            $msg = 'User has been deactive phone successfully!';
        }

        Session::flash('success', $msg);

        //  Session::flash('success', 'User has been active phone successfully!');  
        return response()->json(['phone_verified' => $user->phone_verified]);
    }
    // @endEdit



}
