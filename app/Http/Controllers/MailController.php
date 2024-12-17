<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;


class MailController extends Controller
{
    public function sendEmail() {
        try {
            $toEmailAddress = "gulamo.amd@gmail.com";
            $welcomeMessage = "Recebeu este email de teste";
            Mail::to($toEmailAddress)->send(new SendWelcomeMail($welcomeMessage));
            dd("Email enviado com sucesso!");
        } catch (Exception $e) {
            Log::error("Não foi possível enviar o e-mail: " . $e->getMessage());
        }

    }
}
