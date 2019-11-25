<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addUserClientRequest extends FormRequest
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
            
            'email' => 'unique:users,email',
            'email' => 'unique:users_clients,email',
            
            
        ];
    }
    public function messages(){
        return [
            'email.unique' => 'Email này đã được sử dụng',
            
        ];
    }
}
