<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProdLabelRequest extends FormRequest
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
            'txtCateName'=>'unique:type_products,name,'.$this->segment(4).',id'
        ];
    }

    public function messages(){
        return [
            //
            'txtCateName.unique'=>'Hãng sản phẩm đã tồn tại!'
        ];
    }
}
