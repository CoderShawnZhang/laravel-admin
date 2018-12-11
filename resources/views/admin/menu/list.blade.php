@extends('admin.layouts.app')
@section('pageTitle')
    菜单列表<small>Control panel</small>
@endsection
@section('content')
    @include('admin.components.table.tableTop',['buts'=> $toolsCompose])
    <div class="row">
        <div class="col-xs-12">
            <div class="box box box-primary">
                @include('admin.components.table.tableHeader',['search'=>$searchCompose])
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        @include('admin.components.table.tableHead',['table' => $tableCompose])
                        @foreach($list as $key => $val)
                            <tr>
                                <td>{{ $val['id'] }}</td>
                                <td>{{ $val['name'] }}</td>
                                <td>{{ $val['route'] }}</td>
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
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('script')
    @include('admin.components.modal.delete',['title' => '操作提示','content' => '你确定删除%menu_name这条菜单吗？'])
@endsection