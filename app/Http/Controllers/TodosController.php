<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;



use App\Todos;



class TodosController extends Controller
{
    //
    public function index(Request $request)
    {
      $alltodos = DB::table("mt_todos")->orderBy("added_on", "desc")->get();
      $data = array('todos' => $alltodos, 'err_code' => '0', 'err_msg' => "All todos fetched!");

      return view("todos.index")->with("data", $data);

    }

    public function addTodo(Request $request)
    {
      try
      {
       if(isset($request->save))
       {
         $todo = new Todos;
         $todo->title = $request->todotitle;
         $todo->body = $request->todobody;

        $save =  $todo->save();
        if($save)
        {
          return redirect("/my-todos")->with('err_msg', "Todo added!");
        }
        else
        {
          return redirect("/my-todos")->with('err_msg', "Todo could not be added!");
        }
       }
     }

     catch(Exception $exp)
     {
       return redirect("/my-todos")->with('err_msg', "Todo could not be added!");
     }
     catch(\Illuminate\Database\QueryException $e)
     {
       return redirect("/my-todos")->with('err_msg', "Todo could not be added!");
     }

    }



}
