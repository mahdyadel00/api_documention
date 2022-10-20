<?php

use App\Events\Fish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace' => 'Api'], function () {

    Route::get('/broadcast', function () {
        broadcast(new Fish());
    });



    Route::get('return_payment', 'OrderController@return_payment')->name('return_payment');
    Route::get('wallet/return_deposit', 'WalletController@return_deposit')->name('return_deposit');

    Route::post('checkLoginSuccess', 'PassportController@check_login_success');
    Route::post('login', 'PassportController@login');
    Route::post('register', 'PassportController@register');
    Route::post('otpregister', 'PassportController@OtpRegister');
    Route::post('register_code_verfication', 'PassportController@register_code_verfication');
    Route::get('categories', 'CategoryController@index');
    Route::get('jobs', 'ProductController@jobs');
    Route::get('cities', 'GeneralController@cities');
    Route::get('advertisement', 'AdvertisementController@index');
    Route::get('advertisement/{id}', 'AdvertisementController@show');
    Route::get('page/{id}', 'PageController@index');
    Route::get('products/all', 'ProductController@all');
    Route::post('products/nearest', 'ProductController@nearest');
    Route::post('products/search', 'ProductController@search');
    Route::get('product/details/{id}', 'ProductController@details');
    Route::get('order/status', 'OrderController@order_status');
    Route::get('order/extension_status', 'OrderController@extension_status');
    Route::get('test_notify', 'OrderController@test_notify');
    Route::get('product/status', 'ProductController@product_status');
    Route::get('product/delivery_types', 'ProductController@delivery_types');
    Route::get('product/report/status', 'ProductController@report_status');
    Route::get('product/distinguish/statuses', 'ProductController@distinguish_statuses');
    Route::get('product/distinguish/statuses/{id}', 'ProductController@distinguish_statuses');

    Route::get('submitted_orders/all', 'SubmittedOrderController@all');
    Route::get('submitted_order/{id}', 'SubmittedOrderController@details');
    Route::post('submitted_order/search', 'SubmittedOrderController@search');

    Route::get('user/{id}/orders/products', 'UserController@user_orders_and_products');

    Route::post('forget/password', 'UserController@forget_password');
    Route::post('code_verfication', 'UserController@code_verfication');
    Route::post('forget/password/action', 'UserController@forget_password_action');

    Route::post('email/verfication', 'UserController@email_verfication_send_code');
    Route::post('email/code_verfication', 'UserController@code_verfication');

    Route::get('_order/{id}', 'OrderController@_details');
    Route::get('invoice/{order}', 'OrderController@invoice');
    Route::get('invoice/pdf/{order}', 'OrderController@generate_pdf')->name("order.invoice.pdf");
    Route::get('invoice/extended_order/pdf/{extended_order}', 'OrderController@extended_order_pdf')->name("extended_order.invoice.pdf");
    Route::get('product/distinguish/list', 'ProductController@distinguish_product_list');

    Route::middleware(['auth:api'])->group(function () {

        Route::get('user', 'PassportController@details');
        Route::post('change_password', 'UserController@change_password');
        Route::post('user/online_status', 'UserController@online_status');
        Route::post('user/otp_verify', 'PassportController@otp_verify');
        Route::get('user/transactions', 'UserController@transactions');
        Route::get('user_taxes', 'OrderController@user_taxes');

        Route::post('profile/update', 'PassportController@update_profile');
        Route::post('user/paymnetinfo', 'UserController@paymnetInfo');

        Route::post('user/documentation', 'UserController@documentation');
        Route::get('products', 'ProductController@index');

        Route::post('product/delete', 'ProductController@delete');
        Route::post('product/delete/photo', 'ProductController@delete_photo');


        Route::get('submitted_orders', 'SubmittedOrderController@index');
        Route::get('submitted_order_chat/{submitted_order_id}/{from}/{to}', 'ChatController@fetch_submitted_order_messages');
        Route::post('submitted_order_chat/{submitted_order_id}/{to}', 'ChatController@send_submitted_order_messages');
        Route::get('offers', 'SubmittedOrderController@offers');

        Route::get('wishlist', 'WishlistController@index');
        Route::post('wishlist/add', 'WishlistController@store');
        Route::post('wishlist/delete', 'WishlistController@delete');

        Route::get('orders', 'OrderController@index');
        Route::get('order/{id}', 'OrderController@details');


        Route::post('product/report', 'ProductController@report');

        Route::get('chat/{order_id}/{to}', 'ChatController@order_session');
        Route::get('messages/{order_id}/{to}', 'ChatController@fetch_order_messages');

        Route::get('product_messages/{product_id}/{from}/{to}', 'ChatController@fetch_product_messages');
        Route::post('product_messages/{product_id}/{to}', 'ChatController@send_product_messages');



        Route::post('messages/{order_id}/{to}', 'ChatController@send_order_messages');
        Route::get('unread_messages', 'ChatController@unread_messages');
        Route::post('messages/read/{type}/{id}/{from}', 'ChatController@read_messages');


        Route::get('notification/logs', 'NotificationController@index');
        Route::get('notification/details/{id}', 'NotificationController@details');
        Route::post('notification/read/{id}', 'NotificationController@read');


        Route::get('share/list', 'ShareController@index');
        Route::post('share/add', 'ShareController@store');
        Route::post('share/delete', 'ShareController@delete');
        Route::post('share/to/friend', 'ShareController@send_to_frind');

        Route::get('wallet/logs', 'WalletController@wallet_logs');
        Route::post('wallet/deposit', 'WalletController@deposit');
        Route::post('wallet/withdrawal', 'WalletController@withdrawal');
        Route::post('wallet/refunds', 'WalletController@refunds');


        Route::get('support_help', 'SupportHelpController@index');
        Route::get('support_help/report/status', 'SupportHelpController@report_status');


        
        
        // @midoshriks-4
        Route::get('support_help/user/reports', 'SupportHelpController@user_reports');
        Route::post('support_help/report', 'SupportHelpController@report');

        Route::get('reports/{model}', 'ReportsController@user_reports');
        Route::post('report/{model}', 'ReportsController@createReports');

        
        Route::middleware(['status:deactivated'])->group(function () {
            Route::post('product/add', 'ProductController@store');
            Route::post('product/update/{id}', 'ProductController@update');
            Route::post('product/change_active_status', 'ProductController@change_active_status');
            Route::post('product/distinguish/request', 'ProductController@distinguish_product_action');
            Route::post('product/show_hide_product/{product}', 'ProductController@show_hide_product');

            Route::post('order/add', 'OrderController@store');
            Route::post('order/update_note/{order}', 'OrderController@update_note');
            Route::post('order/change_status', 'OrderController@change_status');
            Route::post('order/add_product', 'OrderController@add_product_to_order');
            Route::post('order/remove_product', 'OrderController@remove_product_from_order');

            Route::post('user/rate', 'UserController@rate_action');
            Route::post('order/extend/request', 'OrderController@extend_order_action');
            Route::post('order/extend/change/status', 'OrderController@change_extended_order_status');
            Route::post('order/extend/accept_or_refuse', 'OrderController@accept_or_refuse_extend_order');
            Route::post('order/extend/confirm_to_delever', 'OrderController@confirm_to_delever');
            Route::post('order/reviews', 'ReviewsController@createreview');

            Route::post('checkout', 'OrderController@checkout');

            Route::post('submitted_order/add', 'SubmittedOrderController@store');
            Route::post('submitted_order/update/{id}', 'SubmittedOrderController@update');
            Route::post('submitted_order/delete', 'SubmittedOrderController@delete');
            Route::post('submitted_order/offer/add', 'SubmittedOrderController@add_offer');
            Route::post('submitted_order/show_hide_submittedOrder/{submitted_order}', 'SubmittedOrderController@show_hide_submittedOrder');


          

        });
    });
});
