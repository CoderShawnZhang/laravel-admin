@extends('admin.layouts.app')
@section('pageTitle')
    广播列表<small>Control panel</small>
@endsection
@section('content')
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div id="app">
                <example-component></example-component>
                <ivuew-component></ivuew-component>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
@endsection