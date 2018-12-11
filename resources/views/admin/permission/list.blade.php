@extends('admin.layouts.app')
@section('pageTitle')
    权限列表<small>Control panel</small>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 permission_group_left">
           @foreach($menuList as $key => $val)
                <div class="box box-solid {{$key == 0 ? '' : 'collapsed-box'}}">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$val['name']}}</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">@if(!empty($val['childs']))<i class="fa fa-minus"></i> @endif</button>
                        </div>
                    </div>
                    @if(!empty($val['childs']))
                    <div class="box-body no-padding permission_group_list">
                        <ul class="nav nav-stacked">
                            @foreach($val['childs'] as $child)
                            <li class="active" data-menu_id="{{$child['id']}}"><a href="#"><i class="fa fa-circle"></i> {{$child['name']}}<span class="{{$detailCompose['count_label']['class']}}">{{count($child['getPermission'])}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                </div>
           @endforeach
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @include('admin.permission.blade.rightContent')
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            init({{$permissionFirstMenuId}});
           $('.permission_group_list ul li').on('click',function () {
              $(this).addClass('active').siblings('li').removeClass('active');
              ajaxPost($(this).data('menu_id'));
           });
           $('.btn-box-tool').on('click',function () {
               $('.box-solid').addClass('collapsed-box');
               $(this).parents('.box-solid').removeClass('.collapsed-box').siblings('div').find('i').addClass('fa-plus');
           });
           function ajaxPost(menu_id) {
               //异步请求
               option.ajax('ajax', 'get', {"menu_id": menu_id}, function success(data) {
                   $('.permission_group_content').html(data.html)
               });
           }
           function init(menu_id) {
               ajaxPost(menu_id);
           }
        });
    </script>
@endsection