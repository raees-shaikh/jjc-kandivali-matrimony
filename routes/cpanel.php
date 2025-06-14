<?php

use Carbon\Carbon;
use App\Models\Subscription;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;


Route::domain(config('app.cms_domain'))->group(function () {

    // Route::get('/test', function () {

    // });

    Route::get('/print', function () {
        $pdf = Pdf::loadView('frontend.pdf.form');
        // return view('cms.pdf.consent_from', ['consent_name' => $appointment->consent_name, 'consent_signature' => $appointment->consent_signature]);
        return $pdf->stream(now()->format('d_m_y_h_i_s') . '.pdf');
        return view('frontend.pdf.form');
    })->name('frontend.print');

    require __DIR__ . '/auth.php';

    Route::get("/login", 'App\Http\Controllers\cms\LoginController@loginShow')->name('cms.login');
    Route::post("/login", 'App\Http\Controllers\cms\LoginController@login')->name('cms.login.submit');

    Route::get('/forgot-password', 'App\Http\Controllers\cms\ForgotPasswordController@index')->name('cms.forgotPassword.index');

    // admin auth routes
    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/change-password', 'App\Http\Controllers\cms\ChangePasswordController@changePassword')->name('cms.changePassword.index');
        Route::post('/change-password/{id}', 'App\Http\Controllers\cms\ChangePasswordController@passwordChange')->name('cms.password.submit');

        Route::get('/logout', 'App\Http\Controllers\cms\LoginController@logout')->name("cms.logout");

        Route::get('/', 'App\Http\Controllers\cms\StatisticsController@index')->name("cms.statistics.index");

        Route::get('users/', 'App\Http\Controllers\cms\UserController@index')->name('backend.user.index');
        Route::get('/user/show/{id}', 'App\Http\Controllers\cms\UserController@show')->name("backend.user.show");
        Route::get('/user/create', 'App\Http\Controllers\cms\UserController@create')->name("backend.user.create");
        Route::post('/user/store', 'App\Http\Controllers\cms\UserController@store')->name("backend.user.store");
        Route::get('/user/form-1/edit/{id}', 'App\Http\Controllers\cms\UserController@FormOneEdit')->name("backend.user.form-one-edit");
        Route::post('/user/form-1/update/{id}', 'App\Http\Controllers\cms\UserController@FormOneUpdate')->name("backend.user.form-one-update");
        Route::get('/user/form-2/edit/{id}', 'App\Http\Controllers\cms\UserController@FormTwoEdit')->name("backend.user.form-two-edit");
        Route::post('/user/form-2/update/{id}', 'App\Http\Controllers\cms\UserController@FormTwoUpdate')->name("backend.user.form-two-update");
        // Route::get('/user/delete/{id}', 'App\Http\Controllers\cms\UserController@destroy')->name("backend.user.delete");
        Route::get('/user/profile/{id}', 'App\Http\Controllers\cms\UserController@profile')->name("backend.user.profile");

        Route::get('/user/print/{user_id}', 'App\Http\Controllers\cms\UserController@pdf')->name('backend.user.print');

        Route::post('/user/add/subscription/{user_id}', 'App\Http\Controllers\cms\UserController@createSubscription')->name('backend.user.subscription.create');


        Route::get('orders/', 'App\Http\Controllers\cms\OrderController@index')->name('backend.order.index');
        Route::get('/order/show/{id}', 'App\Http\Controllers\cms\OrderController@show')->name("backend.order.show");

        Route::post('/user/status/{id}', 'App\Http\Controllers\cms\UserController@Status')->name("backend.user.status");

        Route::get('transactions/', 'App\Http\Controllers\cms\TransactionController@index')->name('backend.transaction.index');
        Route::get('/transaction/show/{id}', 'App\Http\Controllers\cms\TransactionController@show')->name("backend.transaction.show");
        Route::get('subscriptions/', 'App\Http\Controllers\cms\SubscriptionController@index')->name('backend.subscription.index');
        Route::get('import/', 'App\Http\Controllers\cms\UserImportController@importIndex')->name('backend.import.index');
        Route::post('user/import/', 'App\Http\Controllers\cms\UserImportController@import')->name('backend.import.user');
        // Route::get('form-download/', 'App\Http\Controllers\cms\FormDownloadController@index')->name('backend.form-download.index');
        // Route::get('form-download/show/{id}', 'App\Http\Controllers\cms\FormDownloadController@show')->name('backend.form-download.show');

    });
});
