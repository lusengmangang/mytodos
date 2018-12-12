@extends('layout.dashboard')
@section('content')
<div class='app-container'>
  @include('templates.topbar')
<div class='app-body'>
<div class='container'>

  <div class='col-md-6'>
  <div class="card"  >
    <div class="card-header bg-trans ">
      <div class='row'>
        <div class='col-md-10'>
    <h5 class=' '>New Todo</h5>
  </div>
  <div class='col-md-2 text-right'>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addTodoMod">
       <i class='la la-cog'></i>
</button>
  </div>
</div>

 </div>
    <div class="card-body fixed-height">
      <?php


      if(isset($data['todos']) &&  count( $data['todos'] ) > 0 )
      {
        echo "<ul class='noul ulist'>";
        foreach($data['todos'] as $item)
        {
          echo "<li><div class='row'><div class='col-md-8'><i class='la la-check-circle'></i> " . $item->title .
          "</div><div class='col-md-4'><small>" . $item->added_on. "</small></div></div></li>";
        }
        echo "</ul>";
      }
      else
      {
          echo "<p class='alert alert-danger'>Ooops! You have not added any todo!</p>";
      }

      ?>

    </div>
  </div>
  </div>



</div>
</div>
</div>


  <div class="modal fade" id="addTodoMod" tabindex="-1" role="dialog" aria-labelledby="addTodoMod" aria-hidden="true">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action='{{ action('TodosController@addTodo') }}' method='post'>
      <div class="modal-header">
        <h5 class="modal-title">Add New Todo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Add your todo information ...</p>


          {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-12">
        <input type="text" required class="form-control" id="todotitle" name='todotitle' placeholder="Todo Title">
      </div>
      <div class="form-group col-md-12">
        <textarea type="text" required class="form-control" id="todobody" name='todobody' placeholder="Todo Body"></textarea>
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
