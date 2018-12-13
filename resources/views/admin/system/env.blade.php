@extends('admin.layouts.app')
@section('pageTitle')
    配置文件<small>Control panel</small>

@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">APP配置</h3>
                </div>
                <div class="box-body">
                    <form role="form">
                        @foreach($envList as $key => $val)
                            <div class="form-group {{ENV_TAG($key)}}">
                                <label class="control-label" for="inputSuccess"><i class="fa fa-desktop"></i> {{$key}} {{ENV_TITLE($key)}}</label>
                                <input type="text" class="form-control" id="inputSuccess" value="{{$val}}" placeholder="{{$val}}" {{ENV_DISABLED($key)}}>
                                <span class="help-block">{{ENV_DESC($key)}}</span>
                            </div>
                        @endforeach
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-desktop"></i> APP_NAME</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="laravel-admin">
                            <span class="help-block">Help block with success</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-desktop"></i> APP_ENV</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="local">
                            <span class="help-block">Help block with success</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-desktop"></i> APP_KEY</label>
                            <input type="text" class="form-control" id="inputSuccess" value="base64:oMIyM+D6fo/Ls4nQYAaoEZN0rEnn58l5g0/cbJ5T5V8=" disabled>
                            <span class="help-block">Help block with success</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-desktop"></i> APP_DEBUG</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="true">
                            <span class="help-block">Help block with success</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-desktop"></i> APP_LOG_LEVEL</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="debug">
                            <span class="help-block">Help block with success</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-desktop"></i> APP_URL</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="http://localhost">
                            <span class="help-block">Help block with success</span>
                        </div>
                        <hr class="box box-danger">
                        <!--数据库配置-->
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-database"></i> DB_CONNECTION</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="mysql">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-database"></i> DB_HOST</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="127.0.0.1">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-database"></i> DB_PORT</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-database"></i> DB_DATABASE</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-database"></i> DB_USERNAME</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-error">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-database"></i> DB_PASSWORD</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <hr class="box box-warning">
                        <!--redis-->
                        <div class="form-group has-warning">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-key"></i> REDIS_HOST</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-warning">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-key"></i> REDIS_PASSWORD</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-warning">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-key"></i> REDIS_PORT</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <!--MAIL_DRIVER-->
                        <hr class="box box-info">
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_DRIVER</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_HOST</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_PORT</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_USERNAME</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_PASSWORD</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_FROM</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_NAME</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-mail">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-envelope-o"></i> MAIL_ENCRYPTION</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <hr class="box" style="border-top-color: #941fb9;">
                        <!--driver-->
                        <div class="form-group has-driver">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-support"></i> BROADCAST_DRIVER</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-driver">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-support"></i> CACHE_DRIVER</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-driver">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-support"></i> SESSION_DRIVER</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-driver">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-support"></i> SESSION_LIFETIME</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                        <div class="form-group has-driver">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-support"></i> QUEUE_DRIVER</label>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                            <span class="help-block has-error">Help block with success</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection