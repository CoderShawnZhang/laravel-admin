@extends('admin.layouts.app')
@section('pageTitle')
    编辑菜单<small>Control panel</small>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">General Elements</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('admin/menu/update',['menu_id'=>$menuData['id']]) }}" method="post">
            {{ csrf_field() }}
            <!-- text input -->
                <div class="form-group">
                    <label>名称</label>
                    <input type="text" name="name" class="form-control" placeholder="名称" value="{{ $menuData['name'] }}">
                </div>
                <div class="form-group">
                    <label>路由</label>
                    <input type="text" name="route" class="form-control" placeholder="路由" value="{{ $menuData['route'] }}">
                </div>
                <div class="form-group">
                    <label>规则</label>
                    <input type="text" name="rules" class="form-control" placeholder="规则" value="{{ $menuData['rules'] }}">
                </div>
                <div class="form-group">
                    <label>Icon</label>
                    <input type="text" name="icon" class="form-control" placeholder="Icon" value="{{ $menuData['icon'] }}">
                </div>
                <!-- selecte2 -->
                <div class="form-group">
                    <label>所属菜单</label>
                    <select id="selData" class="form-control select2" name="parent_id" style="width: 100%;">
                        <option selected="selected" value="0">顶级分类</option>
                        @foreach($menuTree as $val)
                            <option value="{{$val['id']}}">
                                {{$val['html']}}{{$val['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- radio -->
                <div class="form-group">
                    <label>状态</label>
                    <select class="form-control select2" name="state" style="width: 100%;">
                        <option selected="selected" value="1">启用</option>
                        <option value="0">禁用</option>
                        <option value="-1">锁定</option>
                    </select>
                </div>
                <div class="form-group">
                    <div style="width: 70px;float: left;">
                        <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                            <i class="fa fa-arrow-left"></i>返回
                        </a>
                    </div>
                    <div style="width: 70px;float: left;margin-left: 20px">
                        <button type="submit" class="{{$detailCompose['update']['class']}}">更 新</button>
                    </div>
                </div>
                <div class="form-group">
            </form>
        </div>
    </div>
@endsection