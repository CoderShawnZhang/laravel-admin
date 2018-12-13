<?php

namespace App\Http\Controllers\Admin;

use App\Events\ShippingStatusUpdated;
use App\Facades\JobRepository;
use App\Facades\UserRepository;
use App\Jobs\ProcessPodcast;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    public function list()
    {
        $use = UserRepository::findOne(['id' => 1]);
        $job = (new ProcessPodcast($use))->delay(1000);
        $this->dispatch($job);

        $user = UserRepository::findOne(['id'=>1]);

//        $user->notifications()->delete();
//        Notification::send($user, (new InvoicePaid()));

//        $this->dispatch($job);
        $jobList = JobRepository::getQueueList();
        return view('admin.job.list',compact('jobList'));
    }

    public function guangbo()
    {
//        $user = UserRepository::findOne(['id'=>1]);
//        Notification::send($user, (new InvoicePaid()));

//        event(new ShippingStatusUpdated());
        return view('admin.job.guangbo');
    }

    public function vue()
    {
        return view('admin.job.vue');
    }

}
