<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Todos;
use App\Tasks;

class TaskController extends Controller
{
    //


    public function index(Request $request)
    {
      $alltask = DB::table("mt_tasks")->orderBy("added_on", "desc")->get();
      $data = array('tasks' => $alltask, 'err_code' => '0', 'err_msg' => "All tasks fetched!");
      return view("task.index")->with("data", $data);

    }



    public function addTask(Request $request)
    {
      try
      {
       if(isset($request->save))
       {
         $task = new Tasks;
         $task->name = $request->task;
         $task->details = $request->taskdesc;
          $task->started = date('Y-m-d', strtotime(  $request->started )) ;
        $save =  $task->save();
        if($save)
        {
          return redirect("/tasks")->with('err_msg', "Task created!");
        }
        else
        {
          return redirect("/tasks")->with('err_msg', "Task could not be added!");
        }
       }
     }
     catch(Exception $exp)
     {
       return redirect("/tasks")->with('err_msg',  "Task could not be added!");
     }
     catch(\Illuminate\Database\QueryException $e)
     {
       return redirect("/tasks")->with('err_msg', "Task could not be added!");
     }

    }
}
