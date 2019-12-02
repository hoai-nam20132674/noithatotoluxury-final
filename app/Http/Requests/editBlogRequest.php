<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editBlogRequest extends FormRequest
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
            
            'url' => 'required|unique:blogs,url'.$this->id,
            'url' => 'required|unique:products,url|unique:categories,url'
        ];
    }
    public function messages(){
        return [
            'url.required'=>'Vui lòng nhập url',
            'url.unique' => 'Url này đã được sử dụng'
        ];
    }
}
