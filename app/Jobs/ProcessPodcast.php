<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class ProcessPodcast implements ShouldQueue//生成的类都实现了 Illuminate\Contracts\Queue\ShouldQueue 接口, 告诉 Laravel 将该任务推送到队列，而不是立即运行
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $use;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $use)
    {
        $this->use = $use;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.test', ['testVar'=>$this->use['name']], function ($message){
            $message->subject('队列发送邮件'.time())
                ->to('412906819@qq.com');
        });
    }
}
