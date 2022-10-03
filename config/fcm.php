<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAl_lqdOs:APA91bEpJhqA8_J7r-mF4I6z-nBD3fHxn_ZbFmcpZc2Dk9TUqICiYJRadFpGtnBuXRtiFFJRcGNm6P0sS9zFgZoCpkLGYID6Ic9wh85CGweNaAnliclOOUT0FPk1xjjZSAz721rvWdUX'),
        'sender_id' => env('FCM_SENDER_ID', '652724565227'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
