<?php

use App\Events\Elsayed;
use App\Events\Fish;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//This was used for domain verification with Sectigo. Maybe no more needed...
Route::get('/.well-known/pki-validation/85AB6D37554995C7C43E1B9DF3C9628A.txt', function () {
    $headers = array('Content-Type: application/pdf',);
    return response()->download(public_path() . "/85AB6D37554995C7C43E1B9DF3C9628A.txt", '85AB6D37554995C7C43E1B9DF3C9628A.txt', $headers);
    //return 'Route works!';
});

// mo2men
Route::get('/getDate', function () {
    Artisan::call('end:service');
    // return 'OK';
});

Route::get('apk/ejarly', function () {
    return response()->download('apk/ejarly0.01.apk');
});

Route::get('/broadcast', function () {
    var_dump('test');
    event(new Fish());
    // App\Events\Fish::dispatch();
    // broadcast(new Elsayed());
});
// end@mo2men
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('route:clear');
});

// include('frontEnd/index.php');

Auth::routes();
Route::get('/', 'FrontController@index');
Route::get('/front', 'FrontController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'FrontController@products');
Route::get('/product/{id}', 'FrontController@product');
Route::get('/about', 'FrontController@about');
Route::get('/contact', 'FrontController@contact');
Route::post('support', 'FrontController@support');
Route::get('admin', 'Backend\AuthController@login');

Route::get('/{slug}', 'FrontController@page');


// mo2men@support/
// endEdit@support

Route::get('admin/login', 'Backend\AuthController@login')->name('admin.login');
Route::post('admin/logout', 'Backend\AuthController@logout')->name('admin.logout');
Route::post('admin/login', 'Backend\AuthController@actionLogin')->name('admin.login.action');
Route::post('login_with_token', 'Api\PassportController@login_with_token')->name('login.with_token');

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['admin']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::get('category', 'CategoryController@index')->name('admin.categories');
    Route::get('category/add', 'CategoryController@add')->name('admin.category.add');
    Route::post('category/store', 'CategoryController@store')->name('admin.category.store');
    Route::delete('category/{id}/delete', 'CategoryController@delete')->name('admin.category.delete');
    Route::get('category/{id}/edit', 'CategoryController@edit')->name('admin.category.edit');
    Route::patch('category/{id}/update', 'CategoryController@update')->name('admin.category.update');
    Route::post('ckeditor_upload_image', 'UserController@uploadImage')->name('ckeditor_upload_image');

    Route::get('page', 'PageController@index')->name('admin.pages');
    Route::get('page/add', 'PageController@add')->name('admin.page.add');
    Route::post('page/store', 'PageController@store')->name('admin.page.store');
    Route::delete('page/{id}/delete', 'PageController@delete')->name('admin.page.delete');
    Route::get('page/{id}/edit', 'PageController@edit')->name('admin.page.edit');
    Route::patch('page/{id}/update', 'PageController@update')->name('admin.page.update');

    Route::get('user', 'UserController@index')->name('admin.users');
    // 20200222
    Route::get('user/before_launch', 'UserController@before_launch')->name('admin.users.before_launch');
    Route::get('user/contact', 'UserController@contact')->name('admin.users.contact');
    // 20200222
    Route::get('user/add', 'UserController@add')->name('admin.user.add');
    Route::post('user/store', 'UserController@store')->name('admin.user.store');
    Route::delete('user/{id}/delete', 'UserController@delete')->name('admin.user.delete');
    Route::get('user/{id}/edit', 'UserController@edit')->name('admin.user.edit');
    Route::patch('user/{id}/update', 'UserController@update')->name('admin.user.update');
    // @midoshriks@userSupport
    Route::get('user/tickets/{user_id}', 'ReportStatusController@userSupport')->name('admin.user.reports');
    // @endEdit
    // <!-- @midoshriks@documentations -->
    Route::get('user/documentations/{user_id}', 'UserController@user_documentations')->name('admin.user.documentations');
    Route::post('user/documentation/create', 'DocumentationsController@create')->name('admin.user.documentation.create');
    Route::get('user/edit/documentation/{user_id}', 'DocumentationsController@edit')->name('admin.user.editdocumentations');
    Route::patch('user/edit/documentations/{user_id}/update', 'DocumentationsController@update')->name('admin.user.documentations.update');

    Route::put('user/{id}/active/email', 'UserController@active_email')->name('admin.user.active.email');
    // @midoshriks@active-phone
    Route::put('user/{id}/active/phone', 'UserController@active_phone')->name('admin.user.active.phone');
    // <!-- @endEdit -->

    Route::get('advertisement', 'AdvertisementController@index')->name('admin.advertisement');
    Route::get('advertisement/add', 'AdvertisementController@add')->name('admin.advertisement.add');
    Route::post('advertisement/store', 'AdvertisementController@store')->name('admin.advertisement.store');
    Route::delete('advertisement/{id}/delete', 'AdvertisementController@delete')->name('admin.advertisement.delete');
    Route::get('advertisement/{id}/edit', 'AdvertisementController@edit')->name('admin.advertisement.edit');
    Route::patch('advertisement/{id}/update', 'AdvertisementController@update')->name('admin.advertisement.update');

    Route::get('job', 'JobController@index')->name('admin.job');
    Route::get('job/add', 'JobController@add')->name('admin.job.add');
    Route::post('job/store', 'JobController@store')->name('admin.job.store');
    Route::delete('job/{id}/delete', 'JobController@delete')->name('admin.job.delete');
    Route::get('job/{id}/edit', 'JobController@edit')->name('admin.job.edit');
    Route::patch('job/{id}/update', 'JobController@update')->name('admin.job.update');

    Route::get('products', 'ProductController@index')->name('admin.products');
    Route::get('products/reports', 'ProductController@report_products')->name('admin.reports');


    // Mido Add rote add_products
    Route::get('products/add', 'ProductController@add')->name('admin.products.add');
    Route::post('products/add', 'ProductController@add_products')->name('admin.products.create');
    // Mido Add rote add_products

    // MIdo Add Caht Product
    Route::get('product/chat/logs/{product_id}/{user_id}/{to}', 'ProductController@product_chat');
    Route::get('product/chat_product/{product_id}', 'ProductController@chat_all_product');
    // MIdo Add Caht Product

    Route::post('products', 'ProductController@change_block_status')->name('admin.product.change_block_status');
    Route::get('products/distinguish', 'ProductController@distinguish_products')->name('admin.products.distinguish');

    Route::get('products/reveiws/{product_id}', 'ReviewsController@productReviews')->name('admin.products.adminreveiws');


    // Route SubmittedOrder
    Route::get('submittedorder', 'SubmittedOrderController@index')->name('admin.submittedorder');
    Route::post('submittedOrder', 'SubmittedOrderController@change_block_status')->name('admin.submittedOrder.change_block_status');
    Route::get('submittedorder/chat_submittedOrder/{submitted_order_id}', 'SubmittedOrderController@chat_all_submitted_order');
    Route::get('submittedorder/chat/logs/{submitted_order_id}/{user_id}/{to}', 'SubmittedOrderController@submitted_order_chat');


    Route::get('settings', 'UserController@settings')->name('admin.settings');
    Route::post('settings/cash_back_percentage/update', 'UserController@cash_back_percentage_update')->name('admin.settings.cash_back_percentage.update');

    Route::get('user/documentation_requests', 'UserController@documentation_requests')->name('admin.user.documentation_requests');
    Route::get('user/documentation/details/{user_id}', 'UserController@documentation_details')->name('admin.user.documentation.details');
    Route::post('user/documentation/{id}/approve', 'UserController@approve_documentation')->name('admin.user.documentation.approve');

    Route::get('user/{id}/products', 'UserController@products')->name('admin.user.products');
    Route::get('user/{id}/orders', 'UserController@orders')->name('admin.user.orders');
    Route::get('user/{id}/submittedorders', 'UserController@submittedorders')->name('admin.user.submittedorders');
    Route::post('user/order', 'UserController@order_details')->name('admin.user.order');
    Route::get('user/order/{id}', 'UserController@order_details2')->name('admin.user.order.d');
    Route::get('user/{id}/wallet', 'UserController@wallet')->name('admin.user.wallet');
    Route::get('user/{id}/transacions', 'UserController@transacions')->name('admin.user.transacions');
    Route::post('user/{id}/transacion/action', 'UserController@action')->name('admin.user.transacion.action');
    Route::post('user/{id}/transacion/approve', 'UserController@approve')->name('admin.user.transacion.approve');
    Route::get('user/reveiws/{user_id}', 'ReviewsController@userReviews')->name('admin.user.usersreveiws');
    // @midoshriks
    Route::get('user/paymentinformation', 'PaymentInformationController@index')->name('admin.users.paymentInformation');
    Route::get('user/paymentinformation/{user_id}', 'PaymentInformationController@userPayment')->name('admin.user.userpayment');
    // @endEdite


    Route::get('orders', 'OrderController@index')->name('admin.orders');
    Route::post('orders', 'OrderController@index')->name('admin.orders.search');
    Route::get('order/chat/logs/{order}', 'OrderController@chat_logs')->name('admin.orders.chat.logs');
    Route::get('order/transacions/{order}', 'OrderController@transacions')->name('admin.order.transacions');
    Route::get('order/details/{order}', 'OrderController@details')->name('admin.order.details');
    Route::post('order/cancel', 'OrderController@change_cancel_status')->name('admin.order.change_cancel_status');

    Route::get('notifications', 'NotificationController@index')->name('admin.notifications');
    Route::post('notifications/send', 'NotificationController@send')->name('admin.notifications.send');
    // mo2men@mail
    Route::post('notifications/send_mail', 'NotificationController@send_mail')->name('admin.notifications.send_mail');
    // endEdit@mail
    Route::get('distinguish/statuses', 'DistinguishProductStatusController@index')->name('admin.distinguish.statuses');
    Route::get('distinguish/status/add', 'DistinguishProductStatusController@add')->name('admin.distinguish.status.add');
    Route::post('distinguish/status/store', 'DistinguishProductStatusController@store')->name('admin.distinguish.status.store');
    Route::delete('distinguish/status/{id}/delete', 'DistinguishProductStatusController@delete')->name('admin.distinguish.status.delete');
    Route::get('distinguish/status/{id}/edit', 'DistinguishProductStatusController@edit')->name('admin.distinguish.status.edit');
    Route::patch('distinguish/status/{id}/update', 'DistinguishProductStatusController@update')->name('admin.distinguish.status.update');


    Route::get('cities', 'CityController@index')->name('admin.cities');
    Route::get('city/add', 'CityController@add')->name('admin.city.add');
    Route::post('city/store', 'CityController@store')->name('admin.city.store');
    Route::delete('city/{id}/delete', 'CityController@delete')->name('admin.city.delete');
    Route::get('city/{id}/edit', 'CityController@edit')->name('admin.city.edit');
    Route::patch('city/{id}/update', 'CityController@update')->name('admin.city.update');


    // midoshriks@support_help
    Route::get('support_help', 'SupportHelpController@index')->name('admin.support_help');
    Route::get('support_help/add', 'SupportHelpController@add')->name('admin.support_help.add');
    Route::post('support_help/store', 'SupportHelpController@store')->name('admin.support_help.store');
    Route::get('support_help/store/{id}/edit', 'SupportHelpController@edit')->name('admin.support_help.edit');
    Route::patch('support_help/store/{id}/update', 'SupportHelpController@update')->name('admin.support_help.store.update');
    Route::delete('support_help/store/{id}/delete', 'SupportHelpController@delete')->name('admin.support_help.store.delete');
    // endEdit@support_help

    // @midoshriks-3
    Route::get('report_status/add', 'ReportStatusController@add')->name('admin.report_status.add');
    Route::post('report_status/store', 'ReportStatusController@store')->name('admin.report_status.store');
    Route::get('report_status/{model}', 'ReportStatusController@index')->name('admin.report_status');
    Route::get('report_status/store/{id}/edit', 'ReportStatusController@edit')->name('admin.report_status.edit');
    Route::patch('report_status/store/{id}/update', 'ReportStatusController@update')->name('admin.report_status.store.update');
    Route::delete('report_status/store/{id}/delete', 'ReportStatusController@delete')->name('admin.report_status.store.delete');
    // @endEdite

    // @midoshriks-4
    Route::post('tickets', 'ReportStatusController@change_block_reasons')->name('admin.all_tickets.change_block_reasons');
    Route::post('ticketss', 'ReportStatusController@change_finished_reasons')->name('admin.all_tickets.change_finished_reasons');
    Route::get('tickets/{model}', 'ReportStatusController@tickets')->name('admin.all_tickets');
    // @endEdite


    Route::group(['prefix' => 'languages'], function () {
        Route::get('', 'LanguageController@index')->name('index.language');
        Route::get('edit/{id}', 'LanguageController@edit')->name('edit.language');
        Route::post('update/{language}', 'LanguageController@update');
        Route::get('search', 'LanguageController@search');
        Route::get('delete/{id}', 'LanguageController@delete');
    });

});

Route::group(['namespace' => 'Frontend', 'middleware' => 'auth'], function () {
    Route::get('chat', 'ChatController@index')->name('front.chat');
    Route::get('messages', 'ChatController@fetch_messages')->name('front.chat.fetchMessages');
    Route::post('messages', 'ChatController@send_messages')->name('front.chat.sendMessages');

    Route::get('chat/{order_id}/{to}', 'ChatController@order_session')->name('front.order.session');
    Route::get('messages/{order_id}/{to}', 'ChatController@fetch_order_messages')->name('front.chat.fetchOrderMessages');
    Route::post('messages/{order_id}/{to}', 'ChatController@send_order_messages')->name('front.chat.sendOrderMessages');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



