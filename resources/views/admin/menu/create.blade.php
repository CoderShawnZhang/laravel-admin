@extends('admin.layouts.app')
@section('pageTitle')
   新增列表<small>Control panel</small>
@endsection

@section('content')
   <div class="box box-primary">
      <div class="box-header with-border">
         <h3 class="box-title">General Elements</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <form action="{{ route('admin.menu.store') }}" method="post">
            {{ csrf_field() }}
            <!-- text input -->
            <div class="form-group">
               <label>名称</label>
               <input type="text" name="name" class="form-control" placeholder="名称" value="{{old('name')}}">
            </div>
            <div class="form-group">
               <label>路由</label>
               <input type="text" name="route" class="form-control" placeholder="路由" value="{{old('route')}}">
            </div>
            <div class="form-group">
               <label>规则</label>
               <input type="text" name="rules" class="form-control" placeholder="规则" value="{{old('rules')}}">
            </div>
            <div class="form-group">
               <label>Icon</label>
               <input type="text" name="icon" class="form-control" placeholder="Icon" value="{{old('icon')}}">
            </div>
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
            <div class="form-group">
               <label>状态</label>
               <select class="form-control select2" name="state" style="width: 100%;">
                  <option selected="selected" value="1">启用</option>
                  <option value="0">禁用</option>
                  <option value="-1">锁定</option>
               </select>
            </div>
            <div class="form-group">
               <a href="javascript:history.back(-1);" class="btn btn-block btn-default btn-flat" style="width: 80px;float: left;margin-right: 10px;"><i class="fa fa-fw fa-long-arrow-left"></i> 返 回</a>
               <button type="submit" class="{{$detailCompose['add']['class']}}" style="width: 80px;">新 增</button>
            </div>
         </form>
      </div>
      <!-- /.box-body -->
   </div>
@endsection
@section('script')>

@endsection