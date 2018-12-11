@extends('admin.layouts.app')
@inject('menuPresenter','App\Presenters\MenuPresenter')
<?php $menuSet = $menuPresenter->getTableSetting();?>
<?php $menuButs = $menuPresenter->optionButs();?>
<?php $menuSearch = $menuPresenter->searchControl();?>
@section('pageTitle')
    {{ $menuSet['title'] }}<small>Control panel</small>
@endsection

@section('content')
    @foreach($menuButs as $key => $val)
        <a href="{{ $val['route'] }}" class="btn btn-app" style="{{$val['style']}}">
            <i class="{{$val['icon']}}"></i> {{$val['title']}}
        </a>
    @endforeach
    <div class="row">
        <div class="col-xs-12">
            <div class="box box box-primary">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="box-tools">
                        <form action="{{$menuSearch['action']}}" method="{{$menuSearch['method']}}">
                            {{csrf_field()}}
                            <div class="input-group input-group-sm" style="width: 150px;">
                                @foreach($menuSearch['inputs'] as $val)
                                    <input type="{{$val["type"]}}" name="{{$val['name']}}" class="form-control pull-right" placeholder="{{$val['placeholder']}}">
                                @endforeach
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(!empty(@session('success')))
                    <div class="alert alert-success alert-dismissible" id="success-message">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> 操作成功!</h4>
                        菜单更新成功，如导航未生效请刷新页面或清理缓存！
                    </div>
            @endif
            <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>{{ $menuSet['tableHeader']['id'] }}</th>
                            <th>{{ $menuSet['tableHeader']['name'] }}</th>
                            <th>{{ $menuSet['tableHeader']['route'] }}</th>
                            <th>{{ $menuSet['tableHeader']['pid'] }}</th>
                            <th>{{ $menuSet['tableHeader']['rules'] }}</th>
                            <th>{{ $menuSet['tableHeader']['state'] }}</th>
                            <th style="width: 150px;">{{ $menuSet['tableHeader']['option'] }}</th>
                        </tr>
                        @foreach($searchResults as $key => $val)
                            <tr>
                                <td>{{ $val['id'] }}</td>
                                <td>{{ $val['name'] }}</td>
                                <td>{{ $val['route'] }}</td>
                                <td>{{ $val['pid'] }}</td>
                                <td>{{ $val['rules'] }}</td>
                                <td>{{ $val['state'] }}</td>
                                <td>
                                    <a href="{{ url($menuSet['options']['edit']['route'],['menu_id' => $val['id']]) }}"
                                       class="{{ $menuSet['options']['edit']['class'] }}">
                                        {{ $menuSet['options']['edit']['title'] }}
                                    </a>
                                    <a class="{{ $menuSet['options']['delete']['class'] }}"
                                       data-toggle="modal"
                                       data-target="#delete-modal" data-menu_name="{{ $val['name'] }}"
                                       data-url="{{ url($menuSet['options']['delete']['route'],['menu_id'=>$val['id']]) }}">
                                        {{ $menuSet['options']['delete']['title'] }}
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
    @if(!empty(@session('success')))
        <script>
            $('#success-message').delay(2000).fadeOut();
        </script>
    @endif
@endsection