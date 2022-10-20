<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\User;
use Image;
use Illuminate\Http\Request;
use Mail;
use Validator;
use App\Helpers\SMS;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationsLogs;
use App\Repositories\FcmRepository;

class PassportController extends ApiController
{

    public function __construct(FcmRepository $fcmRepo)
    {
        $this->fcmRepo = $fcmRepo;
        parent::__construct();
    }


    public function smsPhone($phone)
    {
        if (substr($phone, 0, 2) == '05') {
            $phone = '966' . substr($phone, 1);
        } elseif (substr($phone, 0, 1) == '5') {
            $phone = '966' . $phone;
        } elseif (substr($phone, 0, 3) == '966') {
            $phone = $phone;
        } elseif (substr($phone, 0, 2) == '00') {
            $phone = substr($phone, 2);
        }        
        return $phone;
    }

    public function OtpRegister(Request $request)
    {

        // if (substr($request->phone, 0, 2) == '05') {
        //     $request->phone = '966' . substr($request->phone, 1);
        // } elseif (substr($request->phone, 0, 1) == '5') {
        //     $request->phone = '966' . $request->phone;
        // } elseif (substr($request->phone, 0, 3) == '966') {
        //     $request->phone = $request->phone;
        // } elseif (substr($request->phone, 0, 2) == '00') {
        //     $request->phone = substr($request->phone, 2);
        // }
        // return $request->phone;

        $userPhone = User::where('phone', $request->phone)->first();
        if ($userPhone) {
            if ($userPhone['username']) {
                return response()->json(['status' => false, 'error' => 'PHONE_REPEAT'], 401);
            }
        }


        $data = [
            'phone' => $request->phone,
            'role_id' => 3,
            'status' => 'deactivated',
        ];


        if ($request->android_token) {
            $data['android_token'] = $request->android_token;
        }

        $user = User::updateOrCreate(
            ['phone' => $request->phone],
            $data
        );


        $user->verification_code_phone = rand(1000, 9999);
        $user->save();


        $sms = new SMS();
        $msg = "Ejarly: Code Verification is $user->verification_code_phone";
        $sms->Send_SMS($this->smsPhone($request->phone), $msg);

        return response()->json(['user' => $user], 200);
    }




  


    public function register(Request $request)
    {

        // return $request->all();

        $validator = Validator::make($request->all(), array(
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
        ));

        foreach ($validator->errors()->getMessages() as $key => $err) {
            switch ($key) {
                case 'username':
                    return response()->json(['status' => false, 'error' => 'USERNAME_REPEAT'], 401);
                    break;
                case 'email':
                    return response()->json(['status' => false, 'error' => 'EMAIL_REPEAT'], 401);
                    break;
            }
        }

        // var_dump($validator->errors()->getMessages());
        // exit;


        $data = [
            'name' => $request->username,
            'username' => strtolower($request->username),
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];


        if ($request->android_token) {
            $data['android_token'] = $request->android_token;
        }

        if ($request->city_id) {
            $data['city_id'] = $request->city_id;
        }


        $data['verification_code_email'] = rand(1000, 9999);



        // $request->phone = $this->updatePhone($request->phone);

        $user = User::where('phone',  $request->phone)->update($data);

        $user = User::where('phone', $request->phone)->first();
        
        Mail::send('email.reset_password', ['user' => $user], function ($message)  use ($user) {
            $subject = "Ejarly: Code Verification";
            $message->to($user->email)->subject($subject);
        });



        // var_dump($request->all());
        // exit;

        $token = $user->createToken('ejarly')->accessToken;

        $title = "مرحبا " . $user->username;
        $body = "حسابك غير مفعل يرجئ توثيق بياناتك والتحقق من بريدك الالكتروني للتفعيل .";

        $fcm_request = new \stdClass;
        $fcm_request->title = $title;
        $fcm_request->body = $body;
        $fcm_request->user_id = $user->id;

        $is_send = $this->fcmRepo->run($fcm_request);
        if ($is_send) {
            $notification = new NotificationsLogs;
            $notification->user_id = $user->id;
            $notification->title = $title;
            $notification->body = $body;
            $notification->type = "notify";
            // $notification->model_id = $order->id;
            $notification->save();
        }


        $title = "مرحباً بكم في إجارلي";
        $body = "نحن سعداء بوجودك معنا";

        $fcm_request = new \stdClass;
        $fcm_request->title = $title;
        $fcm_request->body = $body;
        $fcm_request->user_id = $user->id;
        $is_send = $this->fcmRepo->run($fcm_request);
        if ($is_send) {
            $notification = new NotificationsLogs;
            $notification->user_id = $user->id;
            $notification->title = $title;
            $notification->body = $body;
            $notification->type = "notify";
            // $notification->model_id = $order->id;
            $notification->save();
        }


        return response()->json(['token' => $token, 'user' => $user], 200);
    }


    public function otp_verify(Request $request)
    {
        if ($request->email) {
            $validator = Validator::make($request->all(), array(
                'email' => 'required|email|unique:users,email,' . Auth()->user()->id,
            ));
        }

        if ($request->phone) {
            $validator = Validator::make($request->all(), array(
                'phone' => 'required|unique:users,phone,' . Auth()->user()->id,
            ));
        }

        foreach ($validator->errors()->getMessages() as $key => $err) {
            switch ($key) {
                case 'email':
                    return response()->json(['status' => false, 'error' => 'EMAIL_REPEAT'], 401);
                    break;
                case 'phone':
                    return response()->json(['status' => false, 'error' => 'PHONE_REPEAT'], 401);
                    break;
            }
        }

        if ($request->email) {
            $data = [
                'second_email' => $request->email,
            ];
            $data['verification_code_email'] = rand(1000, 9999);
        } else {
            $data = [
                'second_phone' => $request->phone,
            ];
            $data['verification_code_phone'] = rand(1000, 9999);
        }

        $user = User::where('id', auth()->user()->id)->first();
        $user->update($data);

        if ($request->email) {
            Mail::send('email.reset_password', ['user' => $user], function ($message)  use ($user, $request) {
                $subject = "Ejarly: Code Verification";
                $message->to($request->email)->subject($subject);
            });
        } else {
            $sms = new SMS();
            $msg = "Ejarly: Code Verification is $user->verification_code_phone";
            $sms = $sms->Send_SMS($request->phone, $msg);
        }

        return response()->json(['status' => true, 'user' => $user], 200);
    }

    public function register_code_verfication(Request $request)
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

        $user = User::where('verification_code_phone', $request->code)->orwhere('verification_code_email', $request->code)->first();
        if ($user) {
            if ($user->verification_code_phone == $request->code) {
                $user->phone_verified = 1;
                $user->verification_code_phone = "";
                if ($user->second_phone) {
                    $user->phone = $user->second_phone;
                    $user->second_phone = "";
                }
            } else {
                $user->email_verified = 1;
                $user->verification_code_email = "";
                if ($user->second_email) {
                    $user->email = $user->second_email;
                    $user->second_email = "";
                }
            }

            $user->save();
            return response()->json([
                'message' => "code is valid Successfully",
                'code' => $request->code,
                'user' => $user,
                'status' => true
            ]);
        }
        return ['status' => false, 'message' => 'Invalid Code !'];
    }




    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
        $user = User::where('email', $request->email)
            ->orwhere('username', strtolower($request->email))
            ->orwhere('phone', $request->email)
            ->get()->first();

        if (!$user)
            return response()->json(['status' => false, 'error' => 'unauthorized'], 401);

        if ($user->email === $request->email || $user->username === strtolower($request->email) || $user->phone === $request->email) {



            $credentials = [
                'email' => $user->email,
                'password' => $request->password,
                'role_id' => 3,
            ];

            if (auth()->attempt($credentials)) {

                $user = auth()->user();
                if ($user->status == 'blocked') {
                    return response()->json(['status' => false, 'message' => 'User is Blocked']);
                }


                if ($user->phone_verified == 0) {
                    $user->verification_code_phone = rand(1000, 9999);
                    $user->save();
                    $sms = new SMS();
                    $msg = "Ejarly: Code Verification is $user->verification_code_phone";
                    $sms->Send_SMS($request->phone, $msg);
                    return response()->json(['status' => false, 'message' => 'The phone is not verified. An activation code has been sent', 'user' => $user]);
                }

                if ($request->android_token) {
                    $user->android_token = $request->android_token;
                    $user->save();
                }
                $token = auth()->user()->createToken('ejarly')->accessToken;

                return response()->json(['token' => $token, 'user' => $user], 200);
            } else {
                return response()->json(['status' => false, 'error' => 'unauthorized'], 401);
            }
        } else {
            return response()->json(['status' => false, 'error' => 'unauthorized'], 401);
        }
    }


    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
     /**
     * @OA\Post(
     *     path="/api/profile/update",
     *     tags={"Profile Update"},
     *     summary="Update Profile User Rest Api Documention",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="update_profile",
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

    public function update_profile(Request $request)
    {
        // return $request->avatar;
        $validator = Validator::make($request->all(), array(
            'username' => 'required|min:3|unique:users,username,' . Auth()->user()->id,
        ));
        foreach ($validator->errors()->getMessages() as $key => $err) {
            switch ($key) {
                case 'username':
                    return response()->json(['status' => false, 'error' => 'USERNAME_REPEAT'], 401);
                    break;
            }
        }
        $user = auth()->user();
        if ($request->first_name && $request->first_name != "") {
            $user->name = $request->first_name;
        }

        if ($request->last_name) {
            $user->last_name = $request->last_name;
        }

        // $user->email = $request->email;
        $user->username = strtolower($request->username);
        // $user->phone = $request->phone;
        $user->longitude = $request->longitude;
        $user->latitude = $request->latitude;
        $user->city_id = $request->city_id;
        if ($request->password && $request->password != "") {
            $user->password = bcrypt($request->password);
        }

        if ($request->avatar) {
            $avatar = $request->avatar;
            $extension = $avatar->extension();
            $imageName = time() . rand(1000, 9999) . '.' . $extension;
            $ImageUpload = Image::make($avatar);
            $originalPath = public_path('uploads');
            $ImageUpload->save($originalPath . "/" . $imageName);
            $user->avatar = $imageName;
        }
        $user->save();



        return response()->json(['status' => true, 'user' => $user], 200);
    }

    public function login_with_token(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 3
        ];


        if ($request->user_id) {
            $user = User::find($request->user_id);
            auth()->login($user);
            $token = auth()->user()->createToken('ejarly')->accessToken;
            session()->put("api_token", $token);
            return redirect()->intended('home');
        } else {
            if (auth()->attempt($credentials)) {
                $token = auth()->user()->createToken('ejarly')->accessToken;
                $user = auth()->user();
                session()->put("api_token", $token);
                return redirect()->intended('home');
            } else {
                return back();
            }
        }
    }

    public function check_login_success(Request $request)
    {
        $res = \DB::table("oauth_access_tokens")->where('user_id', $request->user_id)->get();
        if ($res->count() > 0)
            return response()->json(['status' => true], 200);
        else
            return response()->json(['status' => false], 200);
    }
}
