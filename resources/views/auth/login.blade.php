<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ mix('assets/admin/css/app.min.css') }}">
</head>
<!--背景图片-->
<body class="hold-transition login-page"  id="web_bg" style="background-image: url('{{config('admin.system.login_background_img')}}');">
<div class="login-box">
    <div class="login-logo" style="z-index: 100;">
        <img src="{{config('admin.system.logo')}}" style="width: 40px;"/>
        {{config('admin.system.title')}}</div>
    <div class="login-box-body">
        @if(Session::has('errors'))
            <div id="errors-message" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <h4><i class="icon fa fa-ban"></i> 错误提示!</h4>
                @foreach($errors->all() as $error)
                    {{$error}}!&nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
            </div>
        @endif

        <p class="login-box-msg">用 户 登 录</p>
        <form action="{{url('auth/postlogin')}}" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" value="412906819@qq.com" placeholder="用户名">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" value="222"  placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8"></div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登&nbsp;录</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
