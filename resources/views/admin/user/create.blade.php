@extends('admin.layouts.app')
@section('pageTitle')
    新增用户<small>Control panel</small>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">General Elements</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('admin/user/store') }}" method="post">
            {{ csrf_field() }}
            <!-- text input -->
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" name="name" class="form-control" placeholder="名称">
                </div>
                <div class="form-group">
                    <label>账号</label>
                    <input type="text" name="email" class="form-control" placeholder="账号">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" class="form-control" placeholder="密码">
                </div>
                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="确认密码">
                </div>
                <div class="form-group">
                    <label>角色</label>
                    <a id="role_modal_name" class="btn btn-danger btn-xs"></a>
                    <input type="hidden" name="role_id" value="" id="role_id_value" placeholder="隐藏文本：获取用户搭配的角色id"/>
                    <button type="button"
                       data-toggle="modal"
                       data-target="#roles-modal" style="width: 150px;"
                       class="{{$detailCompose['setRole']['class']}}">分配角色</button>
                </div>
                <div class="form-group">
                    <label>头像</label>
                    <img id="upload_end_show_img_small" src="" data-value="" name="uploadImage" style="width: 60px;height: 60px;display: none;"/>
                    <button type="button"
                            data-toggle="modal"
                            data-target="#avatar-modal" style="width: 150px;"
                            class="btn btn-block btn-danger btn-flat">上传头像</button>
                </div>
                <div class="form-group">
                    <label>个人简介</label>
                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <!-- radio -->
                <div class="form-group">
                    <label>状态</label>
                    <select id="selData" class="form-control select2" name="state" style="width: 100%;">
                        <option selected="selected" value="1">启用</option>
                        <option value="0">禁用</option>
                        <option value="-1">锁定</option>
                    </select>
                    {{--<input type="checkbox" id="checkbox_d1" class="chk_4" /><label for="checkbox_d1"></label>--}}
                </div>
                <div class="form-group">
                    <div style="width: 70px;">
                        <button type="submit" class="{{$detailCompose['add']['class']}}">新 增</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ elixir('assets/admin/css/editor/editor.min.css') }}">
@endsection
@section('script')
    @include('admin.components.modal.uploadImg',['route' => route('admin.user.upload')])
    @include('admin.components.modal.roles',['rolesList'=>$rolesList])
    <script src="{{asset('assets/admin/js/editor/editor.min.js')}}"></script>
    <script>
        $(function () {
            $('.textarea').wysihtml5();
        });
    </script>
@endsection