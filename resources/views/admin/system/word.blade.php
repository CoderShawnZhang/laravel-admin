@extends('admin.layouts.app')
@section('pageTitle')
    说明文档管理<small>Control panel</small>
@endsection
@section('content')
    <div class="form-group">
    <label>说明文档</label>
        <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 550px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ elixir('assets/admin/css/editor/editor.min.css') }}">
@endsection
@section('script')
<script src="{{asset('assets/admin/js/editor/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.

        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
    });
</script>
@endsection