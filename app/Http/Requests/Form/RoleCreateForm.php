<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\BaseRequest;

class RoleCreateForm extends BaseRequest
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
            'name'          =>  'required',
            'display_name'  =>  'required',
            'description'   =>  'required',
            'avatar'        =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  '角色标识不能为空！',
            'display_name.required' =>  '显示名称不能为空！',
            'description.required'  =>  '描述不能为空！',
            'avatar.required'       =>  '头像不能为空！'
        ];
    }
}
