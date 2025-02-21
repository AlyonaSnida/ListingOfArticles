<?php

namespace App\Actions;

use App\Models\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactRequestActions
{
    public function safeInfoFromContacts(array $info)
    {
        ContactRequest::create($info);

        $to_name = config('mail.from.name');
        $to_email = config('mail.from.address');
        $from_name = $info['name'];
        $from_email = $info['email'];
        $data = array(
            'name_user'=>$info['name'],
            "message_user" => $info['message'],
            'phone_user'=>$info['phone'],
            'email_user'=>$info['email'],
        );

        Mail::send('emails', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Тестовое письмо');
            $message->from('your_email@gmail.com', 'Your Name');
        });
    }
}
