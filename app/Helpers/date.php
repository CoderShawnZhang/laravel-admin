<?php
if(!function_exists('format_string')){
    function format_string(int $date)
    {
        return date('Y-m-d H:i:s',$date);
    }
}