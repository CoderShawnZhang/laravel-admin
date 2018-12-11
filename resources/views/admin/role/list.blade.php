@extends('admin.layouts.app')
@section('pageTitle')
    角色列表<small>Control panel</small>
@endsection
@section('content')
    @include('admin.components.table.tableTop',['buts' => $toolsCompose])
    <div class="row">
        @foreach($list as $val)
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{elixir($val['avatar'])}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{$val['name']}}</h3>
                        <p class="text-muted text-center">{{$val['description']}}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                        <a href="{{route('admin.role.detail')}}" class="{{$detailCompose['show']['class']}}"><b>查看</b></a>
                        <a
                           class="{{$detailCompose['show']['class']}}"
                           data-toggle="modal"
                           data-target="#delete-modal" data-menu_name="{{ $val['name'] }}"
                           data-url="{{ url($tableCompose['options']['delete']['route'],['role_id'=>$val['id']]) }}"><b>删除</b></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    @include('admin.components.modal.delete',['title' => '操作提示','content' => '你确定删除%menu_name这条菜单吗？'])
@endsection