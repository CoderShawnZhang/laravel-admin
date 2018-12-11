<link href="{{elixir('assets/admin/css/uploadImage/uploadImage.min.css')}}" rel="stylesheet">
<script src="{{elixir('assets/admin/js/uploadImage/uploadImage.min.js')}}"></script>
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="avatar-form" action="{{$route}}" method="get">
                {{csrf_field()}}
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">{{config('admin.uploadImage.viewParams.title')}}</h4>
                </div>
                <div class="modal-body">
                    <div class="avatar-body">
                        <div class="avatar-upload">
                            <input class="avatar-src" name="avatar_src" type="hidden">
                            <input class="avatar-data" name="avatar_data" type="hidden">
                            <label for="avatarInput">{{config('admin.uploadImage.viewParams.inputFileName')}}</label>
                            <input class="avatar-input" id="avatarInput" name="avatar_file" type="file"></div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="avatar-wrapper cropper-container cropper-bg"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="avatar-preview preview-lg"><img src=""></div>
                                <div class="avatar-preview preview-md"><img src=""></div>
                                <div class="avatar-preview preview-sm"><img src=""></div>
                            </div>
                        </div>
                        <div class="row avatar-btns">
                            <div class="col-md-9">
                                <div class="btn-group">
                                    <button class="btn" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-undo"></i> {{config('admin.uploadImage.viewParams.buts.left')}}</button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-repeat"></i> {{config('admin.uploadImage.viewParams.buts.right')}}</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> {{config('admin.uploadImage.viewParams.submitName')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
<script type="text/javascript">
    $(function () {
        $('#avatar-modal').on('show.bs.modal',function () {
            var imageSrc = "{{config('admin.uploadImage.viewParams.exampleLogo')}}";
            if($('.avatar-preview').find('img').is(":empty")){
                $('.avatar-preview').html('<img src="'+imageSrc+'">');
            }
        });
    });
</script>
