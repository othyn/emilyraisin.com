<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:5000',
            'captcha' => 'required|captcha',
        ];
    }

    /**
     * Send the message.
     */
    public function send()
    {
        $name = filter_var($request->name, FILTER_SANITIZE_STRING);
        $email = filter_var($request->email, FILTER_SANITIZE_STRING);
        $message = filter_var($request->message, FILTER_SANITIZE_STRING);

        $to = env('CONTACT_EMAIL_TO', '');
        $from = env('CONTACT_EMAIL_FROM', '');
        $domain = env('CONTACT_DOMAIN', '');

        if (!empty($to)) {
            $subject = "[{$domain}] New contact request from: {$name} ({$email})";
            $message = "Name: {$name}\r\nEmail: {$email}\r\nMessage:\r\n{$message}";

            $headers = [
                'To' => "You <{$to}>",
                'From' => $from,
                'X-Mailer' => 'PHP/'.phpversion(),
            ];

            mail($to, $subject, $message, $headers);
        }
    }
}
