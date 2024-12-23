<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserAssignedToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $adminName;
    public $userName;

    public function __construct($adminName, $userName)
    {
        $this->adminName = $adminName;
        $this->userName = $userName;
    }

    public function build()
    {
        return $this->view('emails.userAssignedToAdmin')
                    ->subject("Novo Usuário Cadastrado e Associado ao Administrador")
                    ->with([
                        'adminName' => $this->adminName,
                        'userName' => $this->userName,
                    ]);
    }
}
