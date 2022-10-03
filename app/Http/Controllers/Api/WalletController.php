<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\WalletLog;
use App\Models\Order;
use App\Models\GeneralSettings;
use App\User;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;

class WalletController extends ApiController
{

    private $payment;
    public function __construct(PaymentService $payment, User $user)
    {
        $this->payment = $payment;
        $this->user = $user;

        parent::__construct();
    }

    public function wallet_logs($user_id = null)
    {
        $user_id = ($user_id) ? $user_id : auth()->user()->id;
        $wallet_logs = WalletLog::with(['user', 'order'])->where('user_id', $user_id)->where('approved', 1)->latest()->get();
        $total = $this->calculate_total($user_id);
        $paymentInfo = (count(auth()->user()->paymentInfo()) > 0) ? auth()->user()->paymentInfo()[0] : auth()->user()->paymentInfo();
        $applicatin_total = auth()->user()->recover;
        $max_amount = auth()->user()->max_amount > 0 ? auth()->user()->max_amount : GeneralSettings::first()->max_amount;

        return [
            'max_amount' => number_format($max_amount,2),
            'paymentInfo' => $paymentInfo,
            'applicatin_total' => number_format($applicatin_total, 2),
            'logs' => $wallet_logs,
            'total' => $total,
        ];
    }

    public function deposit(Request $request)
    {

        $this->validate($request, [
            'payment_method' => 'required|in:visa,master,mada,applepay',
            'card_number' => 'required',
            'expiry_year' => 'required',
            'expiry_month' => 'required',
            'cvv' => 'required',
            'amount' => 'required',
        ]);

        $holder_name = auth()->user()->first_name . " " . auth()->user()->last_name;
        $request_data = array_merge([
            'holder_name' => $holder_name,
            'payment_brand' => strtoupper($request->payment_method),
            'amount' => $request->amount,
            'email' => auth()->user()->email,
            'user_id' => auth()->user()->id,
            'return_payment' => 'return_deposit',
            'data' => ['user_id' => auth()->user()->id],
        ], $request->all());

        $response = (object) $this->payment->checkout($request_data);
        if ($response) {

            if (isset($response->result)) {

                if (isset($response->result->code) && $response->result->code == '000.200.000') {
                    return [
                        'status' => true,
                        'message' => $response->result->description,
                        'redirect_url' => $response->redirect->url
                    ];
                }
                return ['status' => false, 'message' => $response->result->description, 'data' => $response->result,];
            }
        }

        return ['status' => false, 'message' => "error transaction"];
    }


    public function return_deposit(Request $request)
    {

        $response = (object) $this->payment->transaction($request->all());
        if ($response) {

            if (isset($response->result)) {
                if (isset($response->result->code) && $response->result->code == '000.100.110') {


                    $wallet_log = new WalletLog;
                    $wallet_log->order_id = 0;
                    $wallet_log->user_id = $request->user_id;
                    $wallet_log->type = "deposit";
                    $wallet_log->payment_method = strtolower($response->paymentBrand);
                    $wallet_log->amount = $response->amount;
                    $wallet_log->transaction_id = $response->id;
                    $wallet_log->approved = 1;
                    $wallet_log->save();


                    $data = ['status' => true, 'data' => ['message' => $response->result->description, 'response' => json_encode($response)]];
                } else {
                    $data = ['status' => false,  'data' => ['message' => $response->result->description]];
                }
            }
        } else {
            $data = ['status' => false,  'data' => ['message' => $response]];
        }


        return view('frontend.return_payment', $data);
    }


    public function withdrawal(Request $request)
    {

        $this->validate($request, [
            'amount' => 'required',
        ]);

        $wallet_log = new WalletLog;
        $wallet_log->order_id = 0;
        $wallet_log->user_id = auth()->user()->id;
        $wallet_log->type = "withdrawal";
        $wallet_log->payment_method = '';
        $wallet_log->amount = $request->amount;
        $wallet_log->approved = 0;
        $wallet_log->seen = 0;
        $wallet_log->save();

        $title = 'Withdrawal';
        $content = 'A new withdrawal request ';  
        \Mail::send('email.template', ['content' => $content], function ($message)  use ($title) {
            $subject = $title;
            $message->to('mohdmedic1@gmail.com')->subject($subject);
            // $message->to('momen.elsyd@gmail.com')->subject($subject);
        });

        return ['status' => true, 'message' => 'withdrawal successfully'];
    }



    public function refunds(Request $request)
    {

        $this->validate($request, [
            'amount' => 'required',
        ]);

        $wallet_log = new WalletLog;
        $wallet_log->order_id = 0;
        $wallet_log->user_id = auth()->user()->id;
        $wallet_log->type = "refunds";
        $wallet_log->payment_method = '';
        $wallet_log->amount = $request->amount;
        $wallet_log->approved = 0;
        $wallet_log->save();
        return ['status' => true, 'message' => 'Refunds successfully'];
    }





    private function calculate_total($user_id = null)
    {
        //->where('approved',1)
        // $user_id = ($user_id) ? $user_id : auth()->user()->id;
        // $wallet_logs = WalletLog::where('user_id', $user_id)->where('approved', 1)->get();
        // $total = 0;
        // foreach ($wallet_logs as $wallet_log) {
        //     if ($wallet_log->type == 'withdrawal' || $wallet_log->type == 'refunds' || $wallet_log->type == 'payed_order' ||  $wallet_log->type == 'debts') {
        //         $total = $total - $wallet_log->amount;
        //     } else {
        //         $total = $total + $wallet_log->amount;
        //     }
        // }
        // return $total;
        return $this->user->balance($user_id);
        
    }
}
