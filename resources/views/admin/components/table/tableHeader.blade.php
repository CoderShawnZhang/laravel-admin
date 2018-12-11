<div class="box-header">
    <h3 class="box-title"></h3>
    <div class="box-tools">
        <form action="{{$search['action']}}" method="{{$search['method']}}">
            {{csrf_field()}}
            <div class="input-group input-group-sm" style="width: 150px;">
                @foreach($search['inputs'] as $val)
                    <input type="{{$val["type"]}}" name="{{$val['name']}}" class="form-control pull-right" placeholder="{{$val['placeholder']}}">
                @endforeach
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>