<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addSystemRequest extends FormRequest
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
            
            'url' => 'unique:products,url',
            'url' => 'unique:blogs,url',
            'url' => 'unique:categories,url',
            
        ];
    }
    public function messages(){
        return [
            'url.unique' => 'Url này đã được sử dụng',
            
        ];
    }
}
