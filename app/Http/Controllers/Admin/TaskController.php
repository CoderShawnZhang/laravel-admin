<?php
/**
 * 任务调度
 */
namespace App\Http\Controllers\Admin;

use App\Facades\TaskRepository;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{

    public function set()
    {
        return view('admin.task.set');
    }

    public function list()
    {
//
//        Mail::send('emails.test', ['testVar'=>'aaaaaaa'], function ($message){
//            $message->subject('定时发送邮件'.time())
//                ->to('412906819@qq.com');
//        });

        $taskList = TaskRepository::getTaskList();
        return view('admin.task.list',compact('taskList'));
    }

    public function create()
    {
        return view('admin.task.create');
    }

    public function open(Request $request)
    {
        if($request->ajax()){
            $task_id = $request->input('task_id');
            TaskRepository::open($task_id);
            TaskRepository::clearCache();
            echo json_encode(['success' => true]);
        }
    }

    public function close(Request $request)
    {
        if($request->ajax()){
            $task_id = $request->input('task_id');
            TaskRepository::close($task_id);
            TaskRepository::clearCache();
            echo json_encode(['success' => true]);
        }
    }

    public function clearCache()
    {
        TaskRepository::clearCache();
        dd('清除缓存成功！');
    }
}
