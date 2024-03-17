<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:50',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'province'=>'required',
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6'
        ];
    }

    public function messages():array
    {
        return [
            'name.required'=>'Ten khong duoc de trong',
            'phone.required'=>'SDT khong duoc de trong',
            'address.required'=>'Dia chi khong duoc de trong',
            'email.required' => 'Email khong duoc de trong',
            'email.email' => 'nhap sai dinh dang email',
            'password.required' => 'mat khau khong duoc trong',
            'password_confirmation.required' => 'Mat khau khong khop'
        ];
    }
}