<?php
if ( ! function_exists('test')) {
    function test(){
        return 123;
    }
}

function basePath(){
    return dirname(dirname(__DIR__));
}