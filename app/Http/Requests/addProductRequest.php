<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addProductRequest extends FormRequest
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
            
            'url' => 'required|unique:products,url|unique:categories,url|unique:blogs,url',
            'content'=>'required',
            'short_description'=>'required'
        ];
    }
    public function messages(){
        return [
            'url.required' => 'Vui lòng nhập url',
            'url.unique' => 'Url này đã được sử dụng',
            'content.required'=>'Vui lòng nhập nội dung giới thiệu sản phẩm',
            'short_description.required'=>'Vui lòng nhập mô tả ngắn cho sản phẩm'
        ];
    }
}
