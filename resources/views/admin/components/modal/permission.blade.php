<!--可选权限列表-->
<div class="modal fade" id="permission-modal" aria-hidden="true" aria-labelledby="permission-modal-label" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">&times;</button>
                <h4 class="modal-title" id="avatar-modal-label">分配权限</h4>
            </div>
            <div class="modal-body">
                <div class="avatar-body">
                    <div class="roles_list row">
                        @include('admin.components.public.permissionTree',['menuList' => $menuList,'permissionList' => $permissionList])
                    </div>
                    <div class="row avatar-btns">
                        <div class="col-md-12">
                            <button type="button" style="width: 120px;float: right;" class="btn btn-success btn-block" data-dismiss="modal"><i class="fa fa-save"></i> 确 认</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>