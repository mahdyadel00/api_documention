<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BackendController
{


    public function login()
    {
        //dd(Auth::guard('admin')->user()->email);
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == '0') {
            return redirect('admin/dashboard');
        }
        return view("admin.login", $this->data);
    }

    public function actionLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        // var_dump(bcrypt($request->password));
        // exit;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => '1'], $request->filled('remember')) || Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => '2'], $request->filled('remember'))) {
            //  Auth::guard('admin')->user();
            return redirect('admin/category');
        } else {

            return back()->withErrors([
                'message' => "email or password is incorrect"
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
