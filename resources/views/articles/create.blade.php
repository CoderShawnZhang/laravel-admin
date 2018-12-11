@extends('layouts.app')
@section('content')
    <h1>撰写新文章</h1>
    <form action="{{ url('article/store') }}" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>正文</label>
            <textarea type="text" name="content" class="form-control" style="height: 260px;"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btnn btn-success form-control" value="发表文章">
        </div>
    </form>
@endsection