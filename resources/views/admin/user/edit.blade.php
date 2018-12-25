@extends('admin.layouts.app')
@section('pageTitle')
    编辑用户<small>Control panel</small>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">General Elements</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('admin/user/update',['user_id'=>$user['id']]) }}" method="post">
            {{ csrf_field() }}
            <!-- text input -->
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" name="name" class="form-control" value="{{$user['name']}}" placeholder="名称">
                </div>
                <div class="form-group">
                    <label>账号</label>
                    <input type="text" name="email" class="form-control" value="{{$user['email']}}" placeholder="路由">
                </div>
                <div class="form-group">
                    <label>角色</label>
                    <a id="role_modal_name" class="btn btn-danger btn-xs">{{$user['role']['roleName']['name']}}</a>
                    <input type="hidden" name="role_id" value="" id="role_id_value" placeholder="隐藏文本：获取用户搭配的角色id"/>
                    <button type="button"
                            data-toggle="modal"
                            data-target="#roles-modal" style="width: 150px;"
                            class="{{$detailCompose['setRole']['class']}}">分配角色</button>
                </div>
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
                        <button type="submit" class="{{$detailCompose['add']['class']}}">更&nbsp;&nbsp;新</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.components.modal.roles',['rolesList'=>$rolesList])
@endsection