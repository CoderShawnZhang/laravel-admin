@inject('permissionPresenter','App\Presenters\PermissionPresenter')
@section('style')
    <link rel="stylesheet" href="{{elixir('assets/admin/plugins/iCheck/flat/'.$detailCompose['hasPermission']['checkbox'].'.css')}}">
@endsection
<div class="row permission_group_content">
    <div class="col-md-12" style="overflow: auto;height: 500px;">
        <form action="{{route('admin.permission.setRolesPermission')}}" method="post">
            {{csrf_field()}}
            <ul class="timeline">
                @foreach($menuList as $key => $val)
                    <li class="time-label">
                        <span class="{{$detailCompose['hasPermission']['timeLabel']}}">&nbsp;{{$val['name']}}&nbsp;&nbsp;<input class="checkAll" type="checkbox"></span>
                    </li>
                    @if(!empty($val['childs']))
                    <li>
                        <i class="fa fa-list-alt {{$detailCompose['hasPermission']['timeLabel_icon']}}"></i>
                        <div class="timeline-item">
                            <div>
                                <table class="table table-hover">
                                    @foreach($val['childs'] as $k => $v)
                                    <tr>
                                        <td><code>{{$v['name']}}</code><input class="checkAllItem" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 0;">
                                            <div style="margin-left: 20px;">
                                                @foreach($permissionList as $permission)
                                                    @if($permission['menu_id'] == $v['id'])
                                                        <code style="color: green;">{{$permission['display_name']}}</code><input type="checkbox">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </li>
                    @endif
                @endforeach
                <li>
                    <div class="setRolePermission"><button type="submit" class="{{$detailCompose['setPermission']['class']}}">确认</button></div>
                </li>
            </ul>
        </form>
    </div>
    <!-- /.col -->
</div>
@section('script')
<script src="{{ elixir('assets/admin/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        // checkbox添加样式
        var skin = '{{$detailCompose['hasPermission']['checkbox']}}';
        $('.permission_group_content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_flat-'+skin});
        $('.permission_group_content input[class="checkAll"]').on('ifChanged', function(){
            if($(this).is(':checked')){
                $(this).parents('span').parent('li').next('li').find('input').iCheck('check');
                $(this).parents('span').parent('li').next('li').find('input').prop('checked','checked');
            }else{
                $(this).parents('span').parent('li').next('li').find('input').iCheck('uncheck');
                $(this).parents('span').parent('li').next('li').find('input').removeAttr('checked');
            }
        });
        $('.permission_group_content input[class="checkAllItem"]').on('ifChanged', function(){
            if($(this).is(':checked')){
                $(this).parents('td').parents('tr').next('tr').find('input').iCheck('check');
                $(this).parents('td').parents('tr').next('tr').find('input').prop('checked','checked');
            }else{
                $(this).parents('td').parents('tr').next('tr').find('input').iCheck('uncheck');
                $(this).parents('td').parents('tr').next('tr').find('input').removeAttr('checked');
            }
        });
    });
</script>
@endsection