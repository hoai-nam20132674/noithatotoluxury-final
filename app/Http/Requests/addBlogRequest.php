<?php

namespace App\Http\Requests;

// use App\Http\Requests\Request;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class addBlogRequest extends FormRequest
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
            'image'=>'image|mimes:jpg,png,gif,jpeg'
        ];
    }
    public function messages(){
        return [
            'url.unique' => 'Url này đã được sử dụng',
            'image' =>'Định dạng ảnh image không đúng',
            'image' => 'Định dạng ảnh không đúng'
        ];
    }
}
