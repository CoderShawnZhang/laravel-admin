<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">涛</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{config('admin.system.logo')}}" style="width: 30px;"/> <b>Admin</b>系统</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">
                        <i class="fa fa-lock"></i><!--锁屏-->
                    </a>
                </li>
                <!-- Messages: style can be found in dropdown.less-->
                @include('admin.components.navDropdown.messagesMenu')
                <!-- Notifications: style can be found in dropdown.less -->
                @include('admin.components.navDropdown.notificationsMenu')
                <!-- Tasks: style can be found in dropdown.less -->
                @include('admin.components.navDropdown.tasksMenu')
                <!-- User Account: style can be found in dropdown.less -->
                @include('admin.components.navDropdown.userMenu')
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>