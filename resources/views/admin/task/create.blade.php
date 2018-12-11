@extends('admin.layouts.app')
@section('pageTitle')
    创建任务<small><a href="#"><i class="fa fa-circle-o text-red"></i>  <span class="text-red">创建任务前确定在crontab里加入了该任务！</span></a></small>

@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">General Elements</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.task.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>任务名称</label>
                    <input type="text" name="name" class="form-control" placeholder="角色名" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label>任务等级</label>
                    <select class="form-control select2" name="description" style="width: 100%;">
                        <option selected="selected" value="1">1级</option>
                        <option value="0">2级</option>
                        <option value="-1">3级</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>触发频率</label>
                    <input type="text" name="description" class="form-control" placeholder="描述" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label>命令</label>
                    <input type="text" name="description" class="form-control" placeholder="描述" value="{{old('description')}}">
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