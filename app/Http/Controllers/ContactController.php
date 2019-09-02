<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Send a contact email.
     *
     * @param \Illuminate\Http\ContactRequest $request
     */
    public function send(ContactRequest $request)
    {
        $request->send();
    }
}
