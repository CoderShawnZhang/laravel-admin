@if(!empty(@session('success')))
<div class="alert alert-success alert-dismissible" id="success-message">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> 操作成功!</h4>
   {{@session('success')}}
</div>
@endif