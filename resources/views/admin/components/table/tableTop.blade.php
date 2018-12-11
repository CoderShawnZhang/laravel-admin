<div class="row">
    @foreach($buts as $key => $val)
        <div class="col-lg-2 col-xs-6">
            <div class="small-box">
                {!! $val !!}
            </div>
        </div>
    @endforeach
</div>