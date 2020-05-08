<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email|min:6',
            'password'=>'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Không được để trống email',
            'email.email'=>'Email không đúng định dạng',
            'email.min'=>'Email phải lớn hơn 5 kí tự',
            'password.required'=>'Mật khẩu không được bỏ trống',
            'password.min'=>'Mật khẩu phải lớn hơn 5 kí tự',

        ];
    }
}
