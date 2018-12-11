<div class="box box-primary">
    <table class="table table-hover">
        <thead>
        {!! \App\FixedWrite\Html\PermissionHtml::permissionTableHead() !!}
        </thead>
        <tbody class="permission_group_content"></tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        init({{$permissionFirstMenuId}});
        function init(menu_id) {
            //异步请求
            option.ajax('ajax', 'get', {"menu_id": menu_id}, function success(data) {
                $('.permission_group_content').html(data.html)
            });
        }
    });
</script>