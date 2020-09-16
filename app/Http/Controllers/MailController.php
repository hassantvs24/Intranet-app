<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailer;

class MailController extends Controller
{
    public $toEmail = '';
    public function new_mail(Request $request)
    {
        $link = "http://intranet-app.test/invite?user=".base64_encode( $request->email )."&group=". base64_encode($request->group_id);
        $email_body = "Dear user please click this link ". $link ." to create account on Intranet air";

        $data = [
            'to' => $request->email,
            'from' => 'ashikur@getonnet.agency',
            'subject' => 'Please confirm your invitation',
            'title' => 'Intranet air invitation',
            "body"     => $email_body
        ];
        $this->toEmail = $request->email;

        Mail::send('email.invitation', compact('data'), function ($message) {
            $message->from('admin@intranet.air', 'Intraner Air');

            $message->to($this->toEmail)->cc('bar@example.com');
        });
        return redirect()->route('all-groups', app()->getLocale() )
        ->with('success', 'User updated successfully');

    }
}
