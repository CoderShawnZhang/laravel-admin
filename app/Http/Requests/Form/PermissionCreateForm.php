<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\BaseRequest;

class PermissionCreateForm extends BaseRequest
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
            'menu_id'       =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  'Action不能为空！',
            'display_name.required' =>  '名称不能为空！',
            'description.required'  =>  '描述不能为空！',
            'menu_id.required'      =>  '所属菜单不能为空！',
        ];
    }
}
