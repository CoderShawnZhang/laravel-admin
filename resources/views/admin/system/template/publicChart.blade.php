<section class="col-lg-7 connectedSortable">
    <div class="box box-success">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="fa fa-comments-o"></i>
            <h3 class="box-title">在线公共通讯</h3>
            <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                    在线人数：<span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span>
                </div>
            </div>
        </div>
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
            <div class="box-body chat" id="chat-box" style="overflow: auto; width: auto; height: 250px;">
                <!-- chat item -->
                <div class="item">
                    <img src="{{elixir('assets/admin/images/user4-128x128.jpg')}}" alt="user image" class="online">
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                            订单管理
                        </a>
                        昨天的#1182727304444022888这张订单一直没有审批，因为有个货号没有库存了，库存那边请确认一下。
                    </p>
                    <div class="attachment">
                        <h4>Attachments:</h4>
                        <p class="filename">
                            Theme-thumbnail-image.jpg
                        </p>
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{elixir('assets/admin/images/user3-128x128.jpg')}}" alt="user image" class="offline">
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                            Alexander Pierce
                        </a>
                        I would like to meet you to discuss the latest news about
                        the arrival of the new theme. They say it is going to be one the
                        best themes on the market
                    </p>
                </div>
                <div class="item">
                    <img src="{{elixir('assets/admin/images/user2-160x160.jpg')}}" alt="user image" class="offline">

                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                            Susan Doe
                        </a>
                        I would like to meet you to discuss the latest news about
                        the arrival of the new theme. They say it is going to be one the
                        best themes on the market
                    </p>
                </div>
            </div>
            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;"></div>
            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
        <div class="box-footer">
            <div class="input-group">
                <input class="form-control" id="message" placeholder="Type message...">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-success" id="publicSend">发送</button>
                </div>
            </div>
        </div>
    </div>
</section>
@section('script')
    <script>
        $(function(){
            $("#chat-box").scrollTop($("#chat-box")[0].scrollHeight);
            $('#publicSend').on('click',function () {
                if($('#message').val() == ''){
                   alert('请输入信息！');return false;
                }
                //异步请求
                option.ajax('send', 'get', {"message": $('#message').val()}, function success(data) {$('#message').val('');});
            });
        });
        window.Echo.channel('public_chartRoom').listen('PublicChartRoomEvent', (e) => {
            console.log(e.message);
            var html = ' <div class="item">\n' +
                '                    <img src="/assets/admin/images/user3-128x128.jpg" alt="user image" class="online">\n' +
                '                    <p class="message">\n' +
                '                        <a href="#" class="name">\n' +
                '                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>\n' +
                '                            订单管理\n' +
                '                        </a>\n' + e.message +
                '                    </p>\n' +
                '                </div>';
            $("#chat-box").append(html);
            $("#chat-box").scrollTop($("#chat-box")[0].scrollHeight);
        });
    </script>
@endsection;