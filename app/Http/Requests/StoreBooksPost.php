<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBooksPost extends FormRequest
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
            'books_name' => 'required|unique:books|max:20',
            
        ];
    }
    public function messages(){
        return [
               'books_name.required' => '名字必填!',
               'books_name.unique' => '名字已有!',
               
               
           ]; 
       }
}
