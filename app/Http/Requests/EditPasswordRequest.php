<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequest extends FormRequest
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
            'password1'=>'required|min:6',
            'password2'=>'required|min:6',
            'password3'=>'required|min:6',

        ];
    }
    public function messages()
    {
        return [
            'password1.required'=>'Mật khẩu không được để trống!',
            'password1.min'=>'Mật khẩu tối thiểu 6 kí tư!',
            'password2.required'=>'Mật khẩu không được để trống!',
            'password2.min'=>'Mật khẩu tối thiểu 6 kí tư!',
            'password3.required'=>'Mật khẩu không được để trống!',
            'password3.min'=>'Mật khẩu tối thiểu 6 kí tư!',
        ];
    }
}
