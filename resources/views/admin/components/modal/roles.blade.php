<div class="modal fade" id="roles-modal" aria-hidden="true" aria-labelledby="roles-modal-label" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="avatar-form" action="{{url('admin/user/upload')}}" method="get">
                {{csrf_field()}}
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">分配角色</h4>
                </div>
                <div class="modal-body">
                    <div class="avatar-body">
                        <div class="roles_list row">
                            @foreach($rolesList as $val)
                                <div class="col-md-3">
                                    <!-- Profile Image -->
                                    <div class="box box-primary roles_box">
                                        <div class="box-body box-profile">
                                            <input type="hidden" class="roles_id" value="{{$val['id']}}">
                                            <img class="profile-user-img img-responsive img-circle" src="{{elixir($val['avatar'])}}" alt="User profile picture">
                                            <h3 class="profile-username text-center">{{$val['name']}}</h3>
                                            <p class="text-muted text-center">{{$val['description']}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row avatar-btns">
                            <div class="col-md-10">
                                <div class="btn-group">
                                </div>
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-block" data-dismiss="modal"><i class="fa fa-save"></i> 确 认</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#roles-modal').on('show.bs.modal',function(){

        });

        $('.roles_box').on('click',function () {

            $('.profile-user-img').removeClass('rolesActive');
            $(this).find('.profile-user-img').addClass('rolesActive');
            var roles_id = $(this).find('.roles_id').val();
            var roles_name = $(this).find('.profile-username').html();
            $('#role_id_value').val(roles_id);
            $('#role_modal_name').html(roles_name);
        });
    });
</script>
