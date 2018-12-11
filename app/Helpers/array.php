<?php
/**
 * 数组类操作辅助函数
 */
if (! function_exists('list_to_tree')) {
    /**
     * 一维数组转层级树
     *
     * @param array $list
     * @param string $pk
     * @param string $pid
     * @param string $child
     * @param int $root
     * @return array
     */
    function list_to_tree(array $list,$pk='id',$pid='parent_id',$child='child',$root=0)
    {
        $tree = [];
        if (is_array($list)) {
            $refer = [];
            foreach ($list as $key => $val) {
                $refer[$val[$pk]] = &$list[$key];
            }
            foreach ($list as $key => $val) {
                $parentId = $val[$pid];
                if ($root == $parentId) {
                    $tree[] = &$list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] = &$list[$key];
                    }
                }
            }
            return $tree;
        }
    }
}

if(!function_exists('create_select_level_tree')){
    /**
     * @param array $array
     * @param int $parent_id
     * @param int $level
     * @param string $html
     * @return array
     */
    function create_select_level_tree(array $array,$parent_id = 0,$level = 0,$html = '-')
    {
        $tree =[];
        foreach($array as $val){
            $val['html'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
            $val['html'] .= $level == 0 ? "" : '|';
            $val['html'] .= str_repeat($html,$level);
            if($val['parent_id'] == $parent_id){
                $tree[] = $val;
                $tree = array_merge($tree,create_select_level_tree($array,$val['id'],$level+1));
            }
        }
        return $tree;
    }
}

if( ! function_exists('two_dimensional_array_sort')){

    /**
     * 二维数组排序
     *
     * @param  $array
     * @param  $on
     * @param  $order
     *
     * @return array
     */
    function two_dimensional_array_sort($array, $on, $order = SORT_ASC)
    {
        $new_array = [];
        $sortable_array = [];
        $on = (string)$on;
        if(count($array) > 0){
            foreach ($array as $k => $v) {
                if(is_array($v)){
                    foreach ($v as $k2 => $v2) {
                        if($k2 == $on){
                            $sortable_array[ $k ] = $v2;
                        }
                    }
                } else {
                    $sortable_array[ $k ] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[ $k ] = $array[ $k ];
            }
        }
        return $new_array;
    }
}