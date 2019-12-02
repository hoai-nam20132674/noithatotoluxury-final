<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            
            
            'email' => 'required|unique:users,email|unique:users_clients,email',
            'confirm_password'=>'same:password'
            
            
        ];
    }
    public function messages(){
        return [
            'email.required'=>'Vui lòng nhập email',
            'email.unique' => 'Email này đã được sử dụng',
            'confirm_password.same'=>'Xác thực mật khẩu không chính xác'
            
        ];
    }
}
