<?php

namespace App\Http\Controllers;
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\SendWelcomeMail;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller,
{
    public function sendEmail() {
        try{
            $toEmailAddress = "gulamo.amd@gmail.com";
            $welcomeMessage = "Recebeu este email de teste";
            $response = Mail::to($toEmailAddress)->send(new SendWelcomeMail($welcomeMessage));
            dd($response);

        }
        catch(Exception $e) {
            \Log::error("Unable to send email" . $e->getMessage());
        }

    }
}
