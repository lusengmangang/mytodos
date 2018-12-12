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
    <h5 class=' '>New Project</h5>
  </div>
  <div class='col-md-2 text-right'>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addTodoMod">
       <i class='la la-cog'></i>
</button>
  </div>
</div>

 </div>
    <div class="card-body">

      <form action='{{ action('ProjectController@addProject') }}' method='post'>
        {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-12">
      <input type="text" required class="form-control" id="pcode" name='pcode' placeholder="Project Code">
    </div>
    <div class="form-group col-md-12">
      <input type="text" required class="form-control" id="pname" name='pname' placeholder="Project Name">
    </div>
  </div>
  <div class="form-group">
    <textarea   class="form-control" id="desc" name='desc' placeholder="Project description"></textarea>
  </div>
  <button type="submit" name='save' value='save' class="btn btn-primary">Add</button>
</form>
    </div>
  </div>
  </div>


  
</div>
</div>
</div>
@endsection
