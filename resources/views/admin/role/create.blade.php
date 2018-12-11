@extends('admin.layouts.app')
@section('pageTitle')
    新增角色<small>Control panel</small>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">General Elements</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.role.store') }}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>角色名</label>
                    <input type="text" name="name" class="form-control" placeholder="角色名" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label>显示名称</label>
                    <input type="text" name="display_name" class="form-control" placeholder="显示名称" value="{{old('display_name')}}">
                </div>
                <div class="form-group">
                    <label>描述</label>
                    <input type="text" name="description" class="form-control" placeholder="描述" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label>头像</label>
                    <input type="hidden" value="{{old('img')}}" id="upload_img_hidden_url" name="avatar">
                    <img id="upload_end_show_img_small" src="{{empty(old('img')) ? config('admin.uploadImage.viewParams.exampleLogo') : config('admin.httpHost').old('img') }}" style="width: 60px;height: 60px;"/>
                    <button type="button"
                            data-toggle="modal"
                            data-target="#avatar-modal" style="width: 150px;"
                            class="{{$uploadImgCompose['uploadButton']['class']}}">上传头像</button>
                </div>
                <div class="form-group">
                    <label>权限</label>
                    <a id="role_modal_name" class="btn btn-danger btn-xs"></a>
                    <input type="hidden" name="role_id" value="" id="role_id_value" placeholder="隐藏文本：获取用户搭配的权限id"/>
                    <button type="button"
                            data-toggle="modal"
                            data-target="#permission-modal" style="width: 150px;"
                            class="{{$detailCompose['setPermission']['class']}}">分配权限</button>
                </div>
                <div class="form-group">
                    <label>状态</label>
                    <select class="form-control select2" name="description" style="width: 100%;">
                        <option selected="selected" value="1">启用</option>
                        <option value="0">禁用</option>
                        <option value="-1">锁定</option>
                    </select>
                </div>
                <div class="form-group">
                    <div style="width: 70px;">
                        <button type="submit" class="{{$detailCompose['add']['class']}}">新 增</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.components.modal.uploadImg',['route' => route('admin.role.upload')]);
    @include('admin.components.modal.permission',['permissionList'=>$permissionList,'menuList'=>$menuList])
    <script>
        $(function () {
            init(3);
            function ajaxPost(menu_id) {
                //异步请求
                option.ajax('http://laravel55.local.alwooo.com/admin/permission/ajax', 'get', {"menu_id": menu_id}, function success(data) {
                    $('.permission_group_content').html(data.html)
                });
            }
            function init(menu_id) {
                ajaxPost(menu_id);
            }
        });
    </script>
@endsection