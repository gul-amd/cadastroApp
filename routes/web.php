<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use APP\Mail\TestEmail;

Route::get('/', [UserController::class, 'index']) -> name('user.index');
Route::get('/list-user', [UserController::class, 'list']) -> name('user.list');
Route::get('/show-user/{user}', [UserController::class, 'show']) -> name('user.show');
Route::get('/create-user', [UserController::class, 'create']) -> name('user.create');
Route::post('/store-user', [UserController::class, 'store']) -> name('user-store');
Route::get('/edit-user/{user}', [UserController::class, 'edit']) -> name('user.edit');
Route::put('/update-user/{user}', [UserController::class, 'update']) -> name('user-update');
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy']) -> name('user.destroy');
Route::get('/user-group', [UserController::class, 'usuarios']) -> name('show.users');
Route::get('/admin-group', [UserController::class, 'administradores']) -> name('show.admins');



Route::get('/send-test-email', function () {
    Mail::to('gulamo.amd@gmail.com')->send(new TestEmail());

    return "Email Enviado";
});
