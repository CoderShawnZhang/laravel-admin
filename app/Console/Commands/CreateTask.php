<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/11/30
 * Time: 下午3:25
 */

namespace App\Console\Commands;


use App\Constants\NumberConstant;
use App\Facades\TaskRepository;
use Illuminate\Console\Command;

class CreateTask extends Command
{
    private $taskTag = 'clearCacheAll';
    /**
     * 命令名称，在控制台执行命令时用到
     *
     * @var string
     */
    protected $signature = 'clearTaskCache:task';

    /**
     * 命令描述
     *
     * @var string
     */
    protected $description = '清理定时任务所有缓存';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 命令具体执行逻辑放在这里
     *
     * @return mixed
     */
    public function handle()
    {
        $task = TaskRepository::findOne(['tag' => $this->commandInfo()['tag']]);
        if($task['state'] == NumberConstant::STATE_OPEN){
            $task['runTimes'] = $task['runTimes']+1;
            $task->save();
            TaskRepository::clearCache();
        }
    }

    public function commandInfo()
    {
        return [
            'name' => '清理所有缓存',
            'rate' => '1',
            'commands' => '*/1 * * * *',
            'description' => '清理所有缓存,包括【菜单列表，任务列表】',
            'runFile' => 'schedule:run',
            'tag' => $this->taskTag,
        ];
    }
}