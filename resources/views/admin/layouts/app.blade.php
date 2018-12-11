<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('admin.system.title')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="{{ elixir('favicon.ico') }}" media="screen" />
    <link rel="stylesheet" href="{{ elixir('assets/admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{elixir('assets/admin/plugins/iCheck/flat/'.$checkBoxSkin.'.css')}}">
    @yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini" style="top: 0;">
<div class="wrapper">
@inject('mainPresenter','App\Presenters\MainPresenters')
@include('admin.layouts.header')
<!-- Left side column. contains the logo and sidebar -->
@include('admin.layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>@yield('pageTitle')</h1>
            @include('admin.layouts.breadcrumbs')
        </section>
        <!-- Main content -->
        <section class="content">
            @include('admin.components.alert.alertMessage')
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- Footer -->
@include('admin.layouts.footer')
<!-- Control Sidebar -->
    @include('admin.layouts.control')
</div>
<!-- javascript -->
<script src="{{ elixir('assets/admin/js/app.min.js') }}"></script>
<script src="{{ elixir('assets/admin/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        option.setCheckBox('{{$checkBoxSkin}}');
        @if(!empty(@session('success')))
        $('#success-message').delay(1000).fadeOut();
        @endif
        @if(isset($errors) && count($errors) > 0)
        $(function () {
            $('#error-message').delay(1000).fadeOut();
        });
        @endif
    });
</script>
@yield('script')
</body>
</html>
