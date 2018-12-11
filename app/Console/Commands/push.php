<?php

namespace App\Console\Commands;

use App\Events\PushMessageEvent;
use Illuminate\Console\Command;

class push extends Command
{
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
        event(new PushMessageEvent(1));
        $this->info('推送成功');
    }
}
