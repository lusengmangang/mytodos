@extends('layout.dashboard')
@section('content')
<div class='app-container'>

  <div class='gsearch'>
    <div class='container'>
    <div class='row'>
    <div class='col-md-10'>
    </div>
      <div class='col-md-2 text-right pull-right'>
        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addTodoMod">
           <i class='la la-plus'></i>
    </button>
      </div>
</div>
    </div>
  </div>

<div class='app-body'>
<div class='container'>


  <?php
  if(isset($data['tasks']) &&  count( $data['tasks'] ) > 0 )
  {
    ?>
    <div class='col-md-6'>
    <div class="card"  >
      <div class="card-header bg-trans ">
        <div class='row'>
          <div class='col-md-10'>
      <h5 class=' '>Recent Tasks</h5>
    </div>

  </div>

   </div>
      <div class="card-body fixed-height">

    <?php

    echo "<ul class='noul ulist'>";
    foreach($data['tasks'] as $item)
    {
      echo "<li><div class='row'><div class='col-md-8'><i class='la la-check-circle'></i> <a href='"  . URL::to('/') . "/tasks/" . $item->id   .   "'>" . $item->name .
      "</a></div><div class='col-md-4'><small>" . $item->added_on. "</small></div></div></li>";
    }
    echo "</ul>";


?>


      </div>
    </div>
    </div>

<?php

  }
  else
  {
      echo "  <div class='col-md-8 offset-2'><div class='alert alert-danger alert-dismissible fade show' role='alert'>Ooops! No task found!

      <button type='button' class='close'  data-dismiss='alert'  aria-label='Close' >
    <span aria-hidden='true' >&times;</span>
  </button>


      </div></div>";
  }

  ?>


</div>
</div>
</div>


  <div class="modal fade" id="addTodoMod" tabindex="-1" role="dialog" aria-labelledby="addTodoMod" aria-hidden="true">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action='{{ action('TaskController@addTask') }}' method='post'>
      <div class="modal-header">
        <h5 class="modal-title">Add New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Add your new task </p>


          {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-12">
        <input type="text" required class="form-control" id="task" name='task' placeholder="Task">
      </div>
      <div class="form-group col-md-12">
        <textarea type="text" required class="form-control" id="taskdesc" name='taskdesc' placeholder="Detailed Task Description"></textarea>
      </div>

      <div class="form-group col-md-12">
          <input type="text" required class="form-control" id="started" name='started' placeholder="Start date in DD-MM-YYYY">
      </div>


    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name='save' value='save' class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
      </form>
    </div>
  </div>
</div>


@endsection
