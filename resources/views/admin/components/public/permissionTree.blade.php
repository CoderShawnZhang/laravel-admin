<!--权限列表-->
<div class="row permission_checkbox_list">
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
                                            <code style="color: green;">{{$permission['display_name']}}</code><input class="item" type="checkbox">
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
</div>
