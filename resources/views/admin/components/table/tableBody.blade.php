@foreach($list as $key => $val)
    <tr>
        <td>{{ $val->id.$val->userProfile->job }}</td>
        <td>{{ $val['name'] }}</td>
        <td>{{ $val['route'] }}</td>
        <td>{{ $val['state'] == 1 ? '显示' : '隐藏' }}</td>
        <td>
            <a href="{{ url($table['options']['edit']['route'],['menu_id' => $val['id']]) }}"
               class="{{ $table['options']['edit']['class'] }}">
                {{ $table['options']['edit']['title'] }}
            </a>
            <a class="{{ $table['options']['delete']['class'] }}"
               data-toggle="modal"
               data-target="#delete-modal" data-menu_name="{{ $val['name'] }}"
               data-url="{{ url($table['options']['delete']['route'],['menu_id'=>$val['id']]) }}">
                {{ $table['options']['delete']['title'] }}
            </a>
        </td>
    </tr>
@endforeach