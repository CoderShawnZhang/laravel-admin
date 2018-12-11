<tr>
    @foreach($table['tableHeader']['columns'] as $key => $val)
        <th style="{{$table['tableHeader']['style']}}">{{ $val }}</th>
    @endforeach
</tr>