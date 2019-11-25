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
            
            'url' => 'unique:products,url',
            'url' => 'unique:blogs,url',
            'url' => 'unique:categories,url',
            'image' => 'image|mimes:jpg,png,gif,jpeg',
            // 'image_detail[]' => 'image|mimes:jpg,png,gif,jpeg'
        ];
    }
    public function messages(){
        return [
            'url.unique' => 'Url này đã được sử dụng',
            'image.image' =>'Định dạng ảnh đại diện không đúng',
            'image.mimes' => 'Định dạng ảnh đại diện không đúng',
            // 'image_detail[].image' =>'Định dạng ảnh chi tiết không đúng',
            // 'image_detail[].mimes' => 'Định dạng ảnh chi tiết không đúng'
        ];
    }
}
