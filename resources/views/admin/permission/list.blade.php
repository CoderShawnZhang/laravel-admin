@extends('admin.layouts.app')
@section('pageTitle')
    权限列表<small>Control panel</small>
@endsection
@section('content')
    @include('admin.components.table.tableTop',['buts' => $toolsCompose])
    <div class="row">
        <div class="col-xs-12">
            <div class="box box box-primary" style="margin-bottom: 0;">
            {{--@include('admin.components.table.tableHeader',['search' => $searchCompose])--}}
            <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        @include('admin.components.table.tableHead',['table'=>$tableCompose])
                        @foreach($permissionList as $key => $val)
                            <tr>
                                <td>{{$val['id']}}</td>
                                <td><a id="role_modal_name" class="btn btn-xs bg-{{ !empty($val['name']) ? 'green' : 'red' }}">{{ $val['name'] }}</a></td>
                                <td>{{ $val['created_at'] }}</td>
                                <td>{{ $val['state'] == 1 ? '显示' : '隐藏' }}</td>
                                <td>
                                    <a href="{{ url($tableCompose['options']['edit']['route'],['menu_id' => $val['id']]) }}"
                                       class="{{ $tableCompose['options']['edit']['class'] }}">
                                        {{ $tableCompose['options']['edit']['title'] }}
                                    </a>
                                    <a class="{{ $tableCompose['options']['delete']['class'] }}"
                                       data-toggle="modal"
                                       data-target="#delete-modal" data-menu_name="{{ $val['name'] }}"
                                       data-url="{{ url($tableCompose['options']['delete']['route'],['menu_id'=>$val['id']]) }}">
                                        {{ $tableCompose['options']['delete']['title'] }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div style="right: 10px;position: absolute;" >{!! $permissionList->links() !!}</div>
        </div>
    </div>
@endsection
@section('script')

@endsection