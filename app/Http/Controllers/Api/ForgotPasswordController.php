<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

use Auth;


class ForgotPasswordController extends ApiController {

    use SendsPasswordResetEmails;


    public function __construct(){
        parent::__construct();
    }




    public function __invoke(Request $request){
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Reset link sent to your email.', 'status' => true], 201)
            : response()->json(['message' => 'Unable to send reset link', 'status' => false], 401);
    }

    protected function sendResetLinkResponse($response)
    {
        return redirect()->route('admin.login')->with('status', trans($response));
    }


}
