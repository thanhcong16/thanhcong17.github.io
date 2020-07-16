<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'subject'=>'required',
            'message'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'subject.required'=>'Chủ đề không được để trống.',
            'message.required'=>'Nội dung không được để trống.',

        ];
    }
}
