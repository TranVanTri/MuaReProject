<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'Ten'=>'required|max:100|min:2',
            // 'Ten'=>'required|max:100|min:2|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',

            
        ];
    }

    public function messages()
    {
        return [
            'Ten.required'=>'Vui lòng nhập tên khu vực.',                
            'Ten.min'=>'Tên khu vực có độ dài 2-100 kí tự.',                
            'Ten.max'=>'Tên khu vực có độ dài 2-100 kí tự.',                
            // 'Ten.regex'=>'Tên nhóm danh mục chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',           

        ];
    }
}
