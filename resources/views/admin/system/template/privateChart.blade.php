<section class="col-lg-5 connectedSortable">
    <!-- 及时通讯 -->
    <div class="box box-warning direct-chat direct-chat-warning">
        <div class="box-header with-border">
            <h3 class="box-title">在线私人频道</h3>
            <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">{{ $onLineCount }}</span>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                    <i class="fa fa-comments"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="direct-chat-messages">
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                    </div>
                    <img class="direct-chat-img" src="{{elixir('assets/admin/images/user1-128x128.jpg')}}" alt="message user image">
                    <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                    </div>
                </div>
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                    </div>
                    <img class="direct-chat-img" src="{{elixir('assets/admin/images/user3-128x128.jpg')}}" alt="message user image">
                    <div class="direct-chat-text">
                        You better believe it!
                    </div>
                </div>
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                    </div>
                    <img class="direct-chat-img" src="{{elixir('assets/admin/images/user1-128x128.jpg')}}" alt="message user image">
                    <div class="direct-chat-text">
                        Working with AdminLTE on a great new app! Wanna join?
                    </div>
                </div>
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                    </div>
                    <img class="direct-chat-img" src="{{elixir('assets/admin/images/user3-128x128.jpg')}}" alt="message user image">
                    <div class="direct-chat-text">
                        I would love to.I would love to.I would love to.I would love to.I would love to.I would love to.I would love to.I would love to.I would love to.
                        I would love to.I would love to.I would love to.
                    </div>
                </div>
            </div>
            <!-- 通讯用户列表 -->
            <div class="direct-chat-contacts" style="width: 160px;right: 0px;">
                <ul class="contacts-list">
                    @foreach($onLineUser as $key => $val)
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="{{empty($val['profile']['avatar']) ? elixir('logo.png') : elixir($val['profile']['avatar'])}}" alt="User Image">
                                <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                         {{$val['name']}}
                                        </span>
                                    <span class="contacts-list-msg">{{empty($val['profile']['job']) ? '未设置' : $val['profile']['job']}}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="box-footer">
            <form action="#" method="post">
                <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-flat">发送</button>
                          </span>
                </div>
            </form>
        </div>
    </div>
</section>
