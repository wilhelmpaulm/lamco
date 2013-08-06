@extends('layouts.base')
@section('main')


<div class="span6 offset3">
    <div class="hero-unit ">
        <hr>
        <h1 class="text-center">Login</h1>
        
        <hr>


        <form class="form-horizontal" action='{{URL::to("login")}}' data-validate="parsley"  method="POST">
            <div class="control-group">
                <label class="control-label" for="inputID"><i class="icon-user"></i> Employee ID</label>
                <div class="controls">
                    <input name="id" type="text" id="inputID" placeholder="00264" value="" data-type="digits" data-trigger="change" data-required="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword"><i class="icon-lock"></i> Password</label>
                <div class="controls">
                    <input type="password" name="password" id="inputPassword" placeholder="Password" value="" data-type="alphanum" data-required="true">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-info btn-large">Sign in</button>
                </div>
            </div>
        </form>
        <p>109301 - purchasing</p>
        <p>109302 - sales</p>
        <p>109303 - production</p>
        <p>109304 - billing</p>
        <p>109305 - delivery</p>
        <p>109306 - admin</p>
        <p>109307 - warehousing (not yet working dont try)</p>
        <p>109308 - management</p>
        <p>password is "pawie2062"</p>
    </div>
</div>
@stop