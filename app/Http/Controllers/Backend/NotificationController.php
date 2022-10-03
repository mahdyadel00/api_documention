<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\NotificationsLogs;
use App\User;
use App\Repositories\FcmRepository;


class NotificationController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        // mo2men@mail
        if ($request->send == 'notification') {
            $this->data['title'] = "Send Notification";
        } else {
            $this->data['title'] = "Send Mail";
        }
        // endEdit@mail
        $this->data['users'] = User::where('role_id', 3)->orderBy('id', 'ASC')->get();
        return view('admin.notification.index', $this->data);
    }
    // mo2men@mail
    public function send_mail(Request $request)
    {
        $this->validate($request, [
            'users' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);


        try {
            $mails = [];
            $users = User::whereIn('id', $request->users)->get();
            foreach ($users as $key => $user) {
                $mails[] = $user->email;
            }
            $title = $request->title;
            $body = $request->body;
            $content = $title . '<br>' . $body;
            \Mail::send('email.template', ['content' => $content], function ($message)  use ($title, $mails) {
                $subject = $title;
                $message->to($mails)->subject($subject);
            });

            // dd($mails);

            session()->flash('success', 'the mail has been sent successfully!');
            return back();
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }
    // endEdit@mail

    public function send(Request $request, FcmRepository $fcmRepo)
    {
        $this->validate($request, [
            'users' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);


        try {
            foreach ($request->users as $user_id) {
                $title = $request->title;
                $body = $request->body;

                $fcm_request = new \stdClass;
                $fcm_request->title = $title;
                $fcm_request->body = $body;
                $fcm_request->user_id = $user_id;
                $fcm_request->data = [
                    //'order_id' => 6
                ];
                $a = $fcmRepo->run($fcm_request);

                if ($a['status']) {
                    $notification_log = new NotificationsLogs;
                    $notification_log->user_id = $user_id;
                    $notification_log->title = $title;
                    $notification_log->body = $body;
                    $notification_log->save();
                }
            }


            session()->flash('success', 'the Notification has been sent successfully!');
            return back();
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return back();
        }
    }
}
