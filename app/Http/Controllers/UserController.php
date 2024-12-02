<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

public function index()
    {
        // Carregar a VIEW
        return view('users.index');
    }

}
