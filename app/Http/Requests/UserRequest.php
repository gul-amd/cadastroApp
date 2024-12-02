<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
      return[
        'name.requred' => 'Campo nome e obrigatorio!',
        'email.requred' => 'Campo e-mail e obrigatorio!',
        'email.email' => 'Necessario enviar e-mail valido!',
        'password.requred' => 'Campo nome e obrigatorio!',
        'password.min' => 'Senha com no minimo :min caracter !',
      ];
    }
}