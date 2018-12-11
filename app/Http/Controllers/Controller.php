<?php

namespace App\Http\Controllers;

use App\Presenters\BasePresenters;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successRouteTo($route,$message)
    {
        return redirect()->route($route)->with('success',$message);
    }

    public function errorBackTo($message)
    {
        return redirect()->back()->withErrors($message);
    }

    public function backIndex($route){
        return redirect()->route($route);
    }

    public function uploadImage(BasePresenters $persenters,$file)
    {
        $upload = $persenters->uploadImg();
        $fileNameStr = $upload['imageName'].'.'.$file->getClientOriginalExtension();
        $file->move($upload['uploadPath'],$fileNameStr);
        $result = array ('result'=>$upload['uploadPath'].'/'.$fileNameStr);
        return json_encode($result);
    }
}
