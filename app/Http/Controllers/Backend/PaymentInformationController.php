<?php
// @midoshriks

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\PaymentInfo;
use  App\USER;
use App\Models\Product;

class PaymentInformationController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }


    // @Shwo all data in table

    public function index(Request $request)
    {
        $this->data['title'] = "Payment Information";
        $this->data['PaymentInformation'] = PaymentInfo::all();

        // test
        // var_dump($this->data['PaymentInformation']);
        // $this->data['users'] = USER::all();

        return view('admin.user.payment_inforamtion', $this->data);
    }

    public function userPayment($user_id)
    {
        $this->data['title'] = "Payment Information";

        // user rewiew
        $this->data['payment'] = PaymentInfo::where('user_id', $user_id)->with(['user'])->first();
        // return $this->data['payment'];
        return view('admin.user.payment', $this->data);
    }
}
