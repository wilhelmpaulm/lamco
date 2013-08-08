@extends('layouts.admin')
@section('main')




<form  class="" data-validate="parsley" action="{{URL::to('admin/add-user')}}" method="post">
    <div class="row-fluid">
        <div class="span4">
            <label for="last_name">Last Name</label>
            <input id="last_name" class="input-block-level" type="text" name="last_name" value="" />
            <label for="first_name">First Name</label>
            <input id="first_name" class="input-block-level" type="text" name="first_name" value="" />
           
            <label for="password">Password</label>
            <input id="password" class="input-block-level" type="text" name="password" value="" />
            <br>
        </div>
        <div class="span4">
            <label for="department">Department</label>
            <select name="department">
                <option>Purchasing</option>
                <option>Sales</option>
                <option>Billing</option>
                <option>Production</option>
                <option>Delivery</option>
            </select>
            
            <label for="job_title">Job_title</label>
            <select name="job_title">
                <option>Staff</option>
                <option>Manager</option>
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