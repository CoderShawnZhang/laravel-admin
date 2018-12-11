<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{elixir($userInfo['profile']['avatar'])}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>{{$userInfo['name']}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
    </div>
</div>
<!-- search form -->
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
    </div>
</form>