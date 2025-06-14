<?php

use App\Models\Transaction;
use GuzzleHttp\RetryMiddleware;
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

Route::domain(config('app.web_domain'))->group(function () {

    Route::get('/', function () {
        return view('frontend.index');
    })->name('frontend.home');

    Route::get('/contact-us', function () {
        return view('frontend.contact-us');
    })->name('frontend.contact-us');
    Route::post("/contact/submit", 'App\Http\Controllers\frontend\ContactUsController@submit')->name('contact.submit');

    Route::post('send-otp', 'App\Http\Controllers\frontend\LoginController@sendOtp')->name('frontend.send-otp')->middleware('throttle:4,1');
    Route::post('verify-otp', 'App\Http\Controllers\frontend\LoginController@verifyOtp')->name('frontend.verify-otp')->middleware('throttle:6,1');

    // user auth routes
    Route::group(['middleware' => 'auth:web'], function () {


        Route::middleware('checkFormFilled')->group(function () {

            Route::get('/profile', 'App\Http\Controllers\frontend\ProfileController@index')->name('frontend.profile');

            Route::middleware(['userSubscribed', 'profileApproved'])->group(function () {

                Route::get('/search', 'App\Http\Controllers\frontend\SearchController@index')->name('frontend.search');

                Route::get('shortlist', 'App\Http\Controllers\frontend\ShortlistController@index')->name('frontend.shortlist.index');
                Route::post('shortlist', 'App\Http\Controllers\frontend\ShortlistController@shortlist')->name('frontend.shortlist');

                Route::get('/profile/view/{profile_no}', 'App\Http\Controllers\frontend\ProfileController@showOtherProfile')->name('frontend.profile.show-2');

                Route::post('/profile/upload/images', 'App\Http\Controllers\frontend\ProfileController@uploadMoreImages')->name('frontend.users.uploadMoreImages');
            });

            Route::get('/subscription', 'App\Http\Controllers\frontend\SubscriptionController@index')->name('frontend.subscription');
        });

        Route::get('/profile/images/delete/{media_id}', 'App\Http\Controllers\frontend\ProfileController@deleteImage')->name('frontend.profile.medial-image-delete');

        Route::get('/profile/details', 'App\Http\Controllers\frontend\ProfileController@show')->name('frontend.profile.show');

        Route::get('/register/form/1', 'App\Http\Controllers\frontend\FormController@createFormOne')->name('frontend.form-one');
        Route::post('/register/form/1', 'App\Http\Controllers\frontend\FormController@storeFormOne')->name('frontend.form-one.store');

        Route::get('/register/form/2', 'App\Http\Controllers\frontend\FormController@createFormTwo')->name('frontend.form-two');
        Route::post('/register/form/2', 'App\Http\Controllers\frontend\FormController@storeFormTwo')->name('frontend.form-two.store');

        Route::get('/register/form/1/edit', 'App\Http\Controllers\frontend\FormController@editFormOne')->name('frontend.form-one.edit');
        Route::post('/register/form/1/update', 'App\Http\Controllers\frontend\FormController@updateFormOne')->name('frontend.form-one.update');

        Route::get('/register/form/2/edit', 'App\Http\Controllers\frontend\FormController@editFormTwo')->name('frontend.form-two.edit');
        Route::post('/register/form/2/update', 'App\Http\Controllers\frontend\FormController@updateFormTwo')->name('frontend.form-two.update');

        Route::post('/logout', 'App\Http\Controllers\frontend\LoginController@logout')->name('frontend.logout');
    });

    Route::post('/form-download/store', 'App\Http\Controllers\frontend\FormDownloadController@store')->name("frontend.form-download.submit");
    Route::get('/form-download/download', 'App\Http\Controllers\frontend\FormDownloadController@download')->name("frontend.form-download.download");

    Route::post('/payment-success', 'App\Http\Controllers\frontend\PaymentController@success')->name('frontend.payment.success');
    Route::post('/payment-failed', 'App\Http\Controllers\frontend\PaymentController@failed')->name('frontend.payment.failed');
    Route::post('/webhook', 'App\Http\Controllers\frontend\WebhookController@handle')->name('frontend.payment.webhook.handle');
});
