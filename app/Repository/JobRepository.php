<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/1
 * Time: 下午4:20
 */

namespace App\Repository;


class JobRepository extends BaseRepository
{
    /**
     * 获取队列驱动
     */
    private function getQueueDriver()
    {
        return env('QUEUE_DRIVER', 'redis');
    }

    /**
     * 获取队列列表
     */
    public function getQueueList()
    {
        $driver = $this->getQueueDriver();
        if($driver == 'redis'){
            $list = $this->getRedisQueue();
        } else {
            $list = $this->getDataBaseQueue();
        }
        return $list;
    }

    /**
     * 从Redis里获取队列
     */
    private function getRedisQueue()
    {

    }

    /**
     * 从数据库里获取队列
     */
    private function getDataBaseQueue()
    {
        return $this->findAll();
    }
}