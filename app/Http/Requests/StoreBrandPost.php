<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
            'brand_name' => 'required|unique:brand|max:20',
            'brand_url' =>'required',
        ];
    }
    public function messages(){
         return [
                'brand_name.required' => '名字必填!',
                'brand_name.unique' => '名字已有!',
                'brand_url.max' => '名字小于等于20位!',
                'brand_url.required' => '网址必填!'
            ]; 
        }
}
