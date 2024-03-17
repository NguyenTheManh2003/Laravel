<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'email'=>'required | email',
            'password'=>'required ',
        ];
    }

    // tùy biến nội dung thông báo

    public function messages():array 
    {
        return [
            'email.required' =>'Email không được để trống !',
            'email.email' =>'Nhập sai định dạng của email',
            'password.required' =>'Mật khẩu không được để trống'
        ];
    }
}