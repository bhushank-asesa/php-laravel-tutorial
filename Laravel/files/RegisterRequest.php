<?php

namespace App\Http\Requests\Public;

use App\Http\Requests\RequestWrapper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends RequestWrapper
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users', 'regex:/^\w.+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
            'password' => ['required_if:register_type,platform', 'min:8', 'max:255', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
            'register_type' => ['required', Rule::in(['platform', 'google', 'facebook', 'apple'])],
            'phone_no' => ['required', 'numeric'],
            "subject_id" => ['required', Rule::exists('subjects', 'id')],
            're_enter_password' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'The username field is required.',
            'password.regex' => 'Enter strong password.',
            'register_type.in' => 'Invalid registration type.',
        ];
    }
}
