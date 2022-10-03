<?php

namespace App\Repositories;

use App\Models\Order;
use App\User;
use App\Models\WalletLog;
use App\Models\PaymentLog;
use App\Models\NotificationsLogs;
use App\Repositories\NotificationRepository;
use App\Repositories\FcmRepository;
use Mail;
use App\Models\GeneralSettings;


class TransactionRepository
{

    public function __construct(FcmRepository $fcmRepo, NotificationRepository $notifyRepo, User $user)
    {
        $this->fcmRepo = $fcmRepo;
        $this->notifyRepo = $notifyRepo;
        $this->user = $user;
    }

    public function wallet_logs($user_id = null)
    {
        $user_id = ($user_id) ? $user_id : auth()->user()->id;
        $wallet_logs = WalletLog::with(['user', 'order'])->where('user_id', $user_id)->where('approved', 1)->latest()->get();
        foreach ($wallet_logs as $k => $wallet_log) {
            if ($wallet_log->type == 'withdrawal' || $wallet_log->type == 'recover' || $wallet_log->type == 'refunds' || $wallet_log->type == 'payed_order' ||  $wallet_log->type == 'debts') {
                $wallet_logs[$k]->sign = "-";
            } else {
                $wallet_logs[$k]->sign = "+";
            }
        }
        $total = $this->calculate_wallet_total($user_id);
        return (object)[
            'logs' => $wallet_logs,
            'total' => $total
        ];
    }

    public function order_wallet_logs($order_id)
    {

        $wallet_logs = WalletLog::with(['user', 'order'])->where('order_id', $order_id)->where('approved', 1)->latest()->get();
        $total = 0;
        foreach ($wallet_logs as $k => $wallet_log) {
            if ($wallet_log->type == 'withdrawal' ||  $wallet_log->type == 'recover' || $wallet_log->type == 'refunds' || $wallet_log->type == 'payed_order' ||  $wallet_log->type == 'debts') {
                $wallet_logs[$k]->sign = "-";
                $total = $total - $wallet_log->amount;
            } else {
                $wallet_logs[$k]->sign = "+";
                $total = $total - $wallet_log->amount;
            }
        }
        return (object)[
            'logs' => $wallet_logs,
            'total' => $total
        ];
    }

    public function payment_logs($user_id = null)
    {
        $user_id = ($user_id) ? $user_id : auth()->user()->id;
        $payment_logs = PaymentLog::with(['user', 'order'])->where('user_id', $user_id)->latest()->get();
        $total = 0;
        foreach ($payment_logs as $payment) {
            $total += $payment->amount;
        }
        return (object)[
            'logs' => $payment_logs,
            'total' => $total
        ];
    }

    public function order_payment_logs($order_id)
    {

        $payment_logs = PaymentLog::with(['user', 'order'])->where('order_id', $order_id)->latest()->get();
        $total = 0;
        foreach ($payment_logs as $payment) {
            $total += $payment->amount;
        }
        return (object)[
            'logs' => $payment_logs,
            'total' => $total
        ];
    }

    public function deposit($request)
    {

        $response = (object) $this->payment->checkout($request);
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


    public function return_debts($user_id = null)
    {
        //->where('approved',1)
        $user_id = ($user_id) ? $user_id : auth()->user()->id;
        $debts = WalletLog::where('user_id', $user_id)->where('type', 'debts')->where('approved', 1)->count('amount');
        $recover = WalletLog::where('user_id', $user_id)->where('type', 'recover')->where('approved', 1)->count('amount');
        
        return $debts - $recover;
    }

    // public function return_deposit($request){
    //     $max_amount = GeneralSettings::first()->max_amount;
    //     $users = User::where('recover', '>', $max_amount)->get();
    // }

    public function return_deposit($request)
    {

        $response = (object) $this->payment->transaction($request);
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


    public function withdrawal($request)
    {


        $wallet_log = new WalletLog;
        $wallet_log->order_id = 0;
        $wallet_log->user_id = auth()->user()->id;
        $wallet_log->type = "withdrawal";
        $wallet_log->payment_method = '';
        $wallet_log->amount = $request->amount;
        $wallet_log->approved = 0;
        $wallet_log->save();
        return ['status' => true, 'message' => 'withdrawal successfully'];
    }



    public function refunds($request)
    {

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



  


    public function calculate_wallet_total($user_id = null)
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
        return $this->user->balance($user_id);
    }

    public function pending_transactions($user_id = null, $order_id = null)
    {
        $wallet_logs = WalletLog::where('approved', 0);
        if ($user_id) {
            $wallet_logs = $wallet_logs->where('user_id', $user_id);
            $wallet_logs->update(['seen'=>1]);

        }

        if ($order_id) {
            $wallet_logs = $wallet_logs->where('order_id', $order_id);
        }
        return $wallet_logs->get();
    }
}
