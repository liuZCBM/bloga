<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodsPost extends FormRequest
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
            'goods_name' => 'required|unique:goods|max:50',
            'brand_id' => 'required',
            'cate_id' => 'required',
            'goods_price' => 'required',
            'goods_num' => 'required|alpha_num|max:8'
        ];
    }
    public function messages(){
        return [
               'goods_name.required' => '名字必填!',
               'goods_name.unique' => '名字已有!',
               'goods_name.max' => '名字1—50位!',
               'goods_price.alpha_num' => '必须数字!', //价格
               'goods_price.required' => '价格必填!', //价格
              
               'goods_num.required' => '库存必填!',//库存
               'goods_num.max' => '名字小于等于20位!',//库存
               'goods_num.alpha_num' => '必须数字!',//库存
               'brand_id.required' => '品牌必填!', 
               'cate_id.required' => '分类必填!'
           ]; 
       }
}
