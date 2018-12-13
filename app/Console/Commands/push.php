<?php
namespace App\Console\Commands;
use App\Constants\NumberConstant;
use App\Events\PushMessageEvent;
use App\Facades\TaskRepository;
use Illuminate\Console\Command;
class push extends Command
{
    private $taskTag = 'push';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:message';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试推送消息';
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $task = TaskRepository::findOne(['tag' => $this->commandInfo()['tag']]);
        if($task['state'] == NumberConstant::STATE_OPEN) {
            event(new PushMessageEvent(1));
            $this->info('推送成功');
        }
    }

    public function commandInfo()
    {
        return [
            'name' => '推送消息',
            'rate' => '5',
            'commands' => '*/1 * * * *',
            'description' => '每分钟发一次系统日志邮件',
            'runFile' => 'schedule:run',
            'tag' => $this->taskTag,
        ];
    }
}