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

if(!function_exists( 'modifyEnv' )){
    function modifyEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
        $contentArray->transform(function ($item) use ($data){
            foreach ($data as $key => $value){
                if(str_contains($item, $key)){
                    return $key . '=' . $value;
                }
            }
            return $item;
        });
        $content = implode($contentArray->toArray(), "\n");
        \File::put($envPath, $content);
    }
}
if(!function_exists('getEnvArray')){
    function getEnvArray()
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
        $envArray = [];
        foreach($contentArray as $key => $val){
            $itemArray = explode('=',$val);
            $key = isset($itemArray['0']) ? $itemArray['0'] : '';
            if(empty($itemArray['1'])){continue;}
            $val = isset($itemArray['1']) ? $itemArray['1'] : '';
            $envArray = array_merge($envArray,[$key => $val]);
        }
       return $envArray;
    }
}


function envMapping($key)
{
    $map = config('env.env_mapping');
    return isset($map[$key]) ? $map[$key] : [];
}

function ENV_DESC($key){
   return isset(envMapping($key)['desc']) ? envMapping($key)['desc'] : '';
}
function ENV_TITLE($key)
{
   return isset(envMapping($key)['title']) ? '('.envMapping($key)['title'].')' : '';
}
function ENV_TAG($key)
{
    return isset(envMapping($key)['tag']) ? envMapping($key)['tag'] : '';
}
function ENV_DISABLED($key)
{
    $disabled = isset(envMapping($key)['disabled']) ? envMapping($key)['disabled'] : true;
    if($disabled){
        return 'disabled';
    }
    return '';
}