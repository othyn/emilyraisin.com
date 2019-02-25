<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('throttle:10,1')->post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string|max:5000',
        'captcha' => 'required|captcha',
    ]);

    $name = filter_var($request->name, FILTER_SANITIZE_STRING);
    $email = filter_var($request->email, FILTER_SANITIZE_STRING);
    $message = filter_var($request->message, FILTER_SANITIZE_STRING);

    $to = env('CONTACT_EMAIL', '');

    if (!empty($to)) {

        $subject = "[emilyraisin.com] New contact form from: {$name} ({$email})";
        $message = "Name: {$name}<br>Email: {$email}<br>Message:<br>{$message}";

        mail($to, $subject, $message);
    }
});
