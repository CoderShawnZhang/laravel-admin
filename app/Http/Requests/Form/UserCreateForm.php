<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateForm extends FormRequest
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
            'name'      =>  'required',
            'email'     =>  'required',
            'password'  =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     =>  '用户名不能为空！',
            'email.required'    =>  '账号不能为空！',
            'password'          =>  '密码不能为空！'
        ];
    }
}
