<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class LoginForm extends BaseRequest
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
            'email'     =>  'required',
            'password'  =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'    =>  '账号不能为空！',
            'password.required' =>  '密码不能为空！'
        ];
    }
}
