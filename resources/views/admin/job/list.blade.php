@extends('admin.layouts.app')
@section('pageTitle')
    队列列表<small>Control panel</small>
@endsection
@section('content')
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th style="width: 10px">ID</th>
                    <th style="width: 100px;">队列标识</th>
                    <th style="width: 450px;">Job</th>
                    <th style="width: 120px;">重试次数</th>
                    <th style="width: 150px;">触发时间</th>
                    <th style="width: 150px;">触发倒计时</th>
                    <th style="width: 150px;">创建时间</th>
                    <th style="width: 150px">操作</th>
                </tr>
                @if(!empty($jobList))
                @foreach($jobList as $job)
                    <tr class="content-list">
                        <td>{{$job['id']}}</td>
                        <td>{{$job['queue']}}</td>
                        <td><?php $payLoad = json_decode($job['payload'],true);echo $payLoad['displayName'];?></td>
                        <td>{{$job['attempts']}}</td>
                        <td>{{format_string($job['available_at'])}}</td>
                        <td> <a class="setTimeOut" data-time="{{$job['available_at']}}">计算中...</a></td>
                        <td>{{$job['created_at']}}</td>
                        <td>
                            <a class="{{$detailCompose['open']['class']}} openBtn" data-id="{{$job['id']}}"><b>开启</b></a>
                            <a class="{{$detailCompose['close']['class']}} closeBtn" data-id="{{$job['id']}}"><b>关闭</b></a>
                        </td>
                    </tr>
                @endforeach
                @endif
            </table>
        </div>

        <!-- /.box-body -->
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            window.setInterval(timeOutLine,1000);
        });
        function timeOutLine() {
            $('.content-list').find('.setTimeOut').each(function () {
                option.timeOut($(this),'<span style="color:green;">已执行</span>');
            });
        }

    </script>
@endsection