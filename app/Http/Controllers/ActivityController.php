<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Todos;
use App\Tasks;
use App\Activity;

class ActivityController extends Controller
{
    //

    public function index(Request $request)
    {

      $taskid = $request->taskid;
      $task =  Tasks::find($taskid);
      $activities = DB::table("mt_activity")->orderBy("added_on", "desc")->get();
      $data = array( 'task' => $task,  'activities' => $activities,

      'err_code' => '0', 'err_msg' => "All activities fetched!");

    return view("activity.index")->with("data", $data);

    }


    public function addLog(Request $request)
    {
      try
      {
        if( !isset($request->taskid))
        {
            return redirect("/tasks")->with('err_msg', "Please select a task!");
        }

       if(isset($request->save))
       {
         $activity = new Activity;
         $activity->task = $request->taskid;
         $activity->activity = $request->activity;
         $activity->details = $request->details ;
          $activity->action = $request->action ;
          $activity->hours = $request->hours ;

        $save =  $activity->save();
        if($save)
        {
          return redirect("/tasks/" .  $request->taskid)->with('err_msg', "Activity saved!");
        }
        else
        {
          return redirect("/tasks/".  $request->taskid)->with('err_msg', "Activity could not be added!");
        }
       }
     }
     catch(Exception $exp)
     {
       return redirect("/tasks/" .  $request->taskid)->with('err_msg',  "Activity could not be added!");
     }
     catch(\Illuminate\Database\QueryException $e)
     {
       return redirect("/tasks/" .  $request->taskid)->with('err_msg', "Activity could not be added!");
     }

    }


}
