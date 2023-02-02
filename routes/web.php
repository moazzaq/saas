<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware('auth')->group(function () {

    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/{post}/send-email', [PostController::class, 'send_to_email'])->name('posts.send_to_email');
    Route::post('posts/{post}/send-email', [PostController::class, 'do_send_to_email'])->name('posts.do_send_to_email');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/subscriptions', [SubscriptionController::class, 'subscriptions'])->name('subscriptions');
    Route::post('/subscriptions', [SubscriptionController::class, 'subscribe'])->name('subscribe');

//    Route::middleware('check.subscribed')->group(function () {

        Route::get('/payment-method', [SubscriptionController::class, 'payment_method'])->name('payment_method');
        Route::get('/receipts', [SubscriptionController::class, 'receipts'])->name('receipts');
        Route::get('/cancel-account', [SubscriptionController::class, 'cancel_account'])->name('cancel_account');
        Route::post('/pause-account', [SubscriptionController::class, 'do_pause_account'])->name('do_pause_account');
        Route::post('/terminate-account', [SubscriptionController::class, 'do_terminate_account'])->name('do_terminate_account');

//    });




//    Route::get('/test', function () {
//        $payLink = request()->user()->newSubscription('default', 43851)
//            ->returnTo(route('home'))
//            ->create();
//
//        return view('billing', ['payLink' => $payLink]);
//    });
});
