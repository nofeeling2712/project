<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Requests;

class ItemRequest extends FormRequest
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
            "title"=>"required|max:20",
        ];
    }
    
    public function messages(){
        return [
            "title.required" => "Bạn phải nhập title",
            "title.max" => "bạn nhập vào quá nhiều"
        ];
    }
}
