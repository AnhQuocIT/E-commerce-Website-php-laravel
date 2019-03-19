<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProdTypeRequest extends FormRequest
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
            //
            'txtCateName'=>'unique:type_products,name'
        ];
    }

    public function messages(){
        return [
            //
            'txtCateName.unique'=>'Danh mục đã tồn tại!'
        ];
    }
}
