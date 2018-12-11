@extends('admin.layouts.app')
@section('pageTitle')
    定时任务列表<small>Control panel</small>
@endsection
@section('content')
    @include('admin.components.table.tableTop',['buts'=> $toolsCompose])
    <div class="box">
        <div class="box-header has-success">
            <h3 class="box-title"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>任务列表设置需要结合crontab+Commands</label></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 50px;">状态</th>
                    <th style="width: 120px;">任务名称</th>
                    <th style="width: 450px;">任务说明</th>
                    <th style="width: 100px;">时间频率</th>
                    <th style="width: 100px;">执行次数</th>
                    <th style="width: 150px;">下次执行时间</th>
                    <th style="width: 150px;">最后一次执行时间</th>
                    <th style="width: 150px;">执行进度</th>
                    <th style="width: 150px">操作</th>
                </tr>
                @foreach($taskList as $task)
                <tr>
                    <td>1.</td>
                    <td><small class="open_close_state label pull-right bg-{{$task['state'] == 1 ? 'green' : 'red'}}">&nbsp;</small></td>
                    <td>{{$task['name']}}</td>
                    <td>{{$task['description']}}</td>
                    <td><small class="label label-danger"><i class="fa fa-clock-o"></i> {{$task['rate']}}mins</small></td>
                    <td><small class="label pull-right bg-blue">{{$task['runTimes']}}</small></td>
                    <td><span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span></td>
                    <td><span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span></td>
                    <td>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                    </td>
                    <td>
                        <a class="{{$detailCompose['open']['class']}} openBtn" data-id="{{$task['id']}}"><b>开启</b></a>
                        <a class="{{$detailCompose['close']['class']}} closeBtn" data-id="{{$task['id']}}"><b>关闭</b></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('script')
    @include('admin.components.modal.taskReadMe',['title' => '定时任务操作说明'])
    <script>
        $(function () {
           $('.openBtn').on('click',function () {
               var that = $(this);
               that.parents('tr').find('.open_close_state').attr('class','open_close_state label pull-right bg-green');
               var url = 'open';
               var method = 'get';
               var data = {'task_id':that.data('id'),'_token':'{{csrf_token()}}'};
               option.ajax(url,method,data,function (res) {
                  if(res.success){
                      // that.html('关闭');

                  }
               })
           });
            $('.closeBtn').on('click',function () {
                var that = $(this);
                that.parents('tr').find('.open_close_state').attr('class','open_close_state label pull-right bg-red');
                var url = 'close';
                var method = 'get';
                var data = {'task_id':that.data('id'),'_token':'{{csrf_token()}}'};
                option.ajax(url,method,data,function (res) {
                    if(res.success){
                        // that.html('关闭');
                    }
                })
            });
        });
    </script>
    @endsection