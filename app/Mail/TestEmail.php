<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Teste de E-mail com Mailtrap";

    public $message = "Este é um e-mail de teste enviado com Mailtrap.";

    public function __construct()
    {
        // Aqui você pode passar dados se necessário
    }

    public function build()
    {
        return $this->view('emails.test'); // Referencia a view que vamos criar abaixo
    }
}
