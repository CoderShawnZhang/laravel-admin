<?php

namespace App\Http\Requests\Form;

use App\Http\Requests\BaseRequest;

class MenuCreateForm extends BaseRequest
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
            'route'     =>  'required',
            'rules'     =>  'required',
            'icon'      =>  'required',
            'parent_id' =>  'required',
            'state'     =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  '路由名称不能为空！',
            'route.required'        =>  '路由地址不能为空！',
            'rules.required'        =>  '路由规则不能为空！',
            'icon.required'         =>  '路由图标不能为空！',
            'parent_id.required'    =>  '所属菜单不能为空！',
            'state.required'        =>  '状态不能为空！'
        ];
    }
}
