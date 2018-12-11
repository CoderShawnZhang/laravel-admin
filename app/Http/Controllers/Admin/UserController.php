<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/20
 * Time: 下午4:05
 */

namespace App\Http\Controllers\Admin;

use App\Facades\RolesRepository;
use App\Facades\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\UserCreateForm;
use App\Http\Requests\Form\UserUpdateForm;
use App\Presenters\UserPresenter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    public function list()
    {
//        $owner = new Role();
//        $owner->name = 'admin';
//        $owner->display_name = 'Project Owner';
//        $owner->description = 'User is the owner of a given project';
//        $owner->save();
//
//        $createPost = new Permission();
//        $createPost->name = 'create-post';
//        $createPost->display_name = 'Create Posts';
//        $createPost->description = 'create new blog posts';
//        $createPost->save();
//        $owner->attachPermission($createPost);

//        $admin = new Role();
//        $admin->name = '222';
//        $admin->display_name = 'User Administrator';
//        $admin->description = 'User is allowed to manage and edit other users';
//        $admin->save();
//
//        $user = User::where('name', '=', '张洪波')->first();
//
//        //调用EntrustUserTrait提供的attachRole方法
//        $user->attachRole($admin); // 参数可以是Role对象，数组或id
//
////        // 或者也可以使用Eloquent原生的方法
////        $user->roles()->attach($admin->id); //只需传递id即可

        $list = UserRepository::getUserAll();
        return view('admin.user.list',compact('list'));
    }

    public function create()
    {
        $rolesList = RolesRepository::getRoleList();
        return view('admin.user.create',compact('rolesList'));
    }

    public function store(UserCreateForm $request)
    {
        try{
            $input  = $request->all();
            $data = [
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password'])
            ];
            $user = UserRepository::create($data);
            if(isset($input['role_id']) && !empty($input['role_id'])){
                $role = RolesRepository::getRoleById($input['role_id']);
                $user->attachRole($role); // 参数可以是Role对象，数组或id
            }
            return $this->successRouteTo('admin.user.list','新增用户成功！');
        } catch (\Exception $e) {
            return $this->errorBackTo($e->getMessage());
        }
    }

    /**
     * 编辑用户
     *
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($user_id)
    {
        $user = UserRepository::findOne(['id' => $user_id]);
        $rolesList = RolesRepository::getRoleList();
        return view('admin.user.edit',compact('user','rolesList'));
    }

    public function update(UserUpdateForm $request)
    {

    }
    /**
     * 删除用户
     *
     * @param $user_id
     */
    public function destroy($user_id)
    {
        UserRepository::destroy($user_id);
    }
    
    public function permission()
    {
        return view('admin.user.permission');
    }

    public function show()
    {
        return view('admin.user.profile');
    }

    public function checkRole()
    {
        $user = User::where('email', '=', 'taobao1875@163.com')->first();
        dd($user->hasRole('admin'));
    }

    public function upload(Request $request)
    {
        if($request->ajax()){
            $file = $request->file(config('admin.uploadImage.form_input_name'));
            echo $this->uploadImage(new UserPresenter(),$file);
        }else{
           return $this->errorBackTo('非AJAX请求异常！');
        }
    }
}