<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMemberRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email,'.$this->id_user.',id',
            'fullname'=>'required|min:4',
            'address'=>'required|min:6',
            'phone'=>'required|min:7|unique:users,phone,'.$this->id_user.',id',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống!',
            'email.email'=>'Email không đúng định dạng!',
            'email.unique'=>'Email đã tồn tai!',
            'fullname.required'=>'Họ tên không được để trống!',
            'fullname.min'=>'Họ tên phải tối thiểu 4 ký tự!',
            'address.required'=>'Địa chỉ không được để trống!',
            'address.min'=>'Địa chỉ phải tối thiểu 6 ký tự!',
            'phone.required'=>'Số điện thoại không được để trống!',
            'phone.min'=>'Số điện thoại tối thiểu 6 ký tự!',
            'phone.unique'=>'Số điện thoại đã tồn tại',

        ];
    }
}
