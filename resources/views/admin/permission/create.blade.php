@extends('admin.layouts.app')
@section('pageTitle')
    新增权限<small>Control panel</small>
@endsection
@section('content')
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('admin.permission.store') }}" method="post">
                {{ csrf_field() }}
                <!-- text input -->
                    <div class="form-group">
                        <label>名称</label>
                        <input type="text" name="display_name" class="form-control" placeholder="名称" value="{{old('display_name')}}">
                    </div>
                    <div class="form-group">
                        <label>Action</label>
                        <input type="text" name="name" class="form-control" placeholder="Action" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>所属菜单</label>
                        <select id="selData" class="form-control select2" name="menu_id" style="width: 100%;">
                            <option selected="selected" value="0">请选择</option>
                            @foreach($secondLevelMenu as $val)
                                <option value="{{$val['id']}}">
                                    {{$val['html']}}{{$val['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>描述</label>
                        <input type="text" name="description" class="form-control" placeholder="Icon" value="{{old('description')}}">
                    </div>
                    <div class="form-group">
                        <a href="javascript:history.back(-1);" class="btn btn-block btn-default btn-flat" style="width: 80px;float: left;margin-right: 10px;"><i class="fa fa-fw fa-long-arrow-left"></i> 返 回</a>
                        <button type="submit" class="{{$detailCompose['add']['class']}}" style="width: 80px;">新 增</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection