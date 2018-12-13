<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{elixir($userInfo['profile']['avatar'])}}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{$userInfo['name']}}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{elixir($userInfo['profile']['avatar'])}}" class="img-circle" alt="User Image">
            <p>
                {{$userInfo['name']}}
                <small>{{$userInfo['profile']['job']}}</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">资料</a>
            </div>
            <div class="pull-right">
                <a href="{{route('logout')}}"  class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    退出
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    {{csrf_field()}}
                </form>
            </div>
        </li>
    </ul>
</li>