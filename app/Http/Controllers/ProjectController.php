<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;



use App\Project;


class ProjectController extends Controller
{
    //


    public function addProject(Request $request)
    {
      try
      {
       if(isset($request->save))
       {
         $project = new Project;
         $project->prj_code = $request->pcode;
         $project->prj_name = $request->pname;
         $project->description = $request->pcode;

        $save =  $project->save();
        if($save)
        {
          return redirect("/dashboard")->with('err_msg', "Project added!");
        }
        else
        {
          return redirect("/dashboard")->with('err_msg', "Project could not be added!");
        }
       }
     }

     catch(Exception $exp)
     {
       return redirect("/dashboard")->with('err_msg', "Project could not be added!");
     }
     catch(\Illuminate\Database\QueryException $e)
     {
       return redirect("/dashboard")->with('err_msg', "Project could not be added!");
     } 

    }


}
