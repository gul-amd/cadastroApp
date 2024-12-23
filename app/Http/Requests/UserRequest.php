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

        $userId = $this->route('user');

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($userId ? $userId->id : null),
            'password' => 'required|min:6',
            'role' => 'required|string|in:user,admin',
            'admin_id' => 'nullable|exists:users,id',
        ];
    }

    public function messages(): array
    {
      return[
        'name.requred' => 'Campo nome e obrigatorio!',
        'email.requred' => 'Campo e-mail e obrigatorio!',
        'email.email' => 'Necessario enviar e-mail valido!',
        'email.unique' => 'O email ja esta cadastrado!',
        'password.requred' => 'Campo nome e obrigatorio!',
        'password.min' => 'Senha com no minimo :min caracter !',
      ];
    }
}
