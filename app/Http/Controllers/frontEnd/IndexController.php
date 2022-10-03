<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use App\User;
class IndexController extends Controller
{
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), array(
            'username'      => 'required|unique:users|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ));

        $errors  = [];
        foreach ($validator->errors()->getMessages() as $key => $err) {
            // var_dump($key);
            // var_dump($err);
            switch ($key) {
                case 'username':
                    $errors[] = 'اسم المستخدم مستخدم من قبل الرجاء كتابة اسم مستخدم اخر.';
                    break;
                case 'email':
                    $errors[] = 'البريد الإلكتروني مستخدم من قبل الرجاء كتابة بريد إلكتروني اخر.';
                    break;
                case 'phone':
                    $errors[] = 'رقم الجوال مستخدم من قبل الرجاء كتابة رقم جوال أخر.';
                    break;
                case 'password':
                    $errors[] = 'الرجاء التأكد من كتابة كلمة مرور صحيحة ولا تقل طولها عن ثمانية أحرف/أرقام';
                    break;
            }
        }

        if (!$validator->fails()) {
            try {
                $user = new User;
                $user->name = $request->username;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->password =  Hash::make($request->password);
                $user->role_id = 3;
                $user->before_launch = '1';
                $user->save();
                Session::flash('success', 'تم حفظ البيانات بنجاح');
                return back();
            } catch (Exception $exception) {
                Session::flash('error', $exception->getMessage());
                return back();
            }
        } else {
            Session::flash('error', $errors);
            return back();
        }
    }
}
