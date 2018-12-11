<?php
/**
 * 文件类操作辅助函数
 */
if(!function_exists('getTaskFileDir')){
    function getTaskFileDir()
    {
        $dir =  dirname(dirname(__FILE__)).'/Console/Commands';
        return $dir;
    }
}

if(!function_exists('getTaskFileList')){
    function getTaskFileList()
    {
        $dir = getTaskFileDir();
        $files = scandir($dir);
        foreach($files as $key => $val) {
            if ($val == '.' || $val == '..') {
                unset($files[$key]);
            }
        }
        return $files;
    }
}