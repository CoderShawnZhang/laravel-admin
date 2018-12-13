<?php

namespace App\Console\Commands;

use App\Constants\NumberConstant;
use App\Events\PushMessageEvent;
use App\Facades\TaskRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailTask extends Command
{
    private $taskTag = 'sendMail';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendMail:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发送邮件命令';

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
        event(new PushMessageEvent(1));
//        $task = TaskRepository::findOne(['tag' => $this->commandInfo()['tag']]);
//        if($task['state'] == NumberConstant::STATE_OPEN){
//            Mail::send('emails.test', ['testVar'=>'4444444'], function ($message){
//                $message->subject('1231定时发送邮件'.time())
//                    ->to('412906819@qq.com');
//            });
//            event(new PushMessageEvent(1));
//        }
    }

    public function commandInfo()
    {
        return [
            'name' => '发送提醒邮件',
            'rate' => '5',
            'commands' => '*/1 * * * *',
            'description' => '每分钟发一次系统日志邮件',
            'runFile' => 'schedule:run',
            'tag' => $this->taskTag,
        ];
    }
}
