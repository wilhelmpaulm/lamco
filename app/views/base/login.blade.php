@extends('layouts.base')
@section('main')


<div class="span6 offset3">
    <div class="hero-unit">
        <hr>
        <h1 class="text-center">Login</h1>
        <hr>
        
    
<form class="form-horizontal" action='{{URL::to("login")}}' method="POST">
  <div class="control-group">
      <label class="control-label" for="inputID"><i class="icon-user"></i> Employee ID</label>
    <div class="controls">
        <input name="id" type="text" id="inputID" placeholder="00264" value="">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword"><i class="icon-lock"></i> Password</label>
    <div class="controls">
        <input type="password" name="password" id="inputPassword" placeholder="Password" value="">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-info btn-large">Sign in</button>
    </div>
  </div>
</form>
         </div>
</div>
@stop