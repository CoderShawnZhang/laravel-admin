<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/30
 * Time: 下午2:59
 */

namespace App\Repository;


use App\Constants\CacheConstant;
use Illuminate\Support\Facades\Cache;

class TaskRepository extends BaseRepository
{
    public function getTaskList()
    {
        $files = getTaskFileList();
        $taskList = Cache::get(CacheConstant::ALL_TASK);
        if(count($files) != count($taskList)){
            foreach($files as $val){
                $className =  str_replace(".php","",$val);
                $T = 'App\\Console\\Commands\\'.$className;
                $object = new $T();
                $commandInfo = $object->commandInfo();
                $hasTask = $this->findOne(['tag'=>$commandInfo['tag']]);
                if(!empty($hasTask)){
                    $this->update(['tag'=>$commandInfo['tag']],$commandInfo);
                    continue;
                }else{
                    $this->delete(['tag'=>$commandInfo['tag']]);
                }
                $this->create($commandInfo);
            }
            $taskList = $this->model->get();
            Cache::forever(CacheConstant::ALL_TASK,$taskList);
        }
        return $taskList;
    }

    public function open($task_id)
    {
        $this->updateById($task_id,['state' => 1]);
    }

    public function close($task_id)
    {
        $this->updateById($task_id,['state' => 0]);
    }

    /**
     * 清除缓存
     */
    public function clearCache($cacheKey = ''){
        if(!empty($cacheKey)){
            Cache::forget($cacheKey);
        }else {
            Cache::forget(CacheConstant::ALL_TASK);
        }
    }
}