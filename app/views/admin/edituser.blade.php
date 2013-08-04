@extends('layouts.admin')
@section('main')



<ul class="breadcrumb ">
    <li>
        <a href="#">Home</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">Purchasing</a> <span class="divider">/</span>
    </li>
    <li class="active">
        Create Purchase Order
    </li>
</ul>
<form  class="" data-validate="parsley" action="{{URL::to('admin/apply-edit-user')}}" method="post">
    <div class="row-fluid">
        <div class="span4">
            <input id="id" required="" class="input-block-level" type="hidden" name="id" value="{{$user->id}}" />
            <label for="last_name">Last Name</label>
            <input id="last_name" required="" class="input-block-level" type="text" name="last_name" value="{{$user->last_name}}" />
            <label for="first_name">First Name</label>
            <input id="first_name" required="" class="input-block-level" type="text" name="first_name" value="{{$user->first_name}}" />
           
            <label for="password">Password</label>
            <input id="password" required="" class="input-block-level" type="text" name="password" value="" />
            <br>
        </div>
        <div class="span4">
            <label for="department">Department</label>
            <select name="department">
                @foreach($departments as $department)
                <option @if($user->department == $department->department)selected=''@endif>{{$department->department}}</option>
                @endforeach
            </select>
            
            <label for="job_title">Job_title</label>
            <select name="job_title">
                @foreach($job_titles as $job_title)
                <option @if($user->job_title == $job_title->job_title)selected=''@endif>{{$job_title->job_title}}</option>
                @endforeach
            </select>
           
        </div>
        <div class="span4">
        </div>
    </div>
    
    <div class="row-fluid">
            <button class="btn btn-warning pull-right">Create New user</button>
        
    </div>

</form>

@stop