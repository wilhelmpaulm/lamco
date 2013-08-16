@extends('layouts.base')
@section('main')


<div class="span6 offset3">
    <div class="">
        <h1 class="text-center f-osr " style="font-size: 150px">Papyrus</h1><br>
        <h5 class="text-center f-qsb "  style="font-size: 23px; font-style: italic">Lamco Paper Products Co., Inc.</h5>
        <!--<h1 class="text-center f-osb ">login    </h1>-->
        <!--<br>-->
        <br>
        <br>
        <!--<hr>-->
        <!--<hr>--> 

        <div class="pad60 mar20  bg-white" style="border: #000; border-style: outset; border-width: 1px" >
        <form class="text-center" action='{{URL::to("login")}}' data-validate="parsley"  method="POST">
            <p class="fs30  ">Log in to your account</p>
            <br>
            <div class="control-group">
                <!--<label class="control-label" for="inputID"><i class="icon-user"></i> Employee ID</label>-->
                <div class="controls ">
                    <!--<i class="icon-user"></i>-->
                    <input name="id" type="text" class="input-block-level" id="inputID" placeholder="USERNAME" value="" data-type="digits" data-trigger="change" data-required="true">
                </div>
            </div>
            <div class="control-group">
                <!--<label class="control-label" for="inputPassword"><i class="icon-lock"></i> Password</label>-->
                <div class="controls">
                    <input type="password" name="password" class="input-block-level" id="inputPassword" placeholder="PASSWORD" value="" data-type="alphanum" data-required="true">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn  btn-info btn-block btn-large" style="font-size: 25px">Sign in</button>
                </div>
            </div>
        </form>
            </div>
<!--        <p>109301 - purchasing</p>
        <p>109302 - sales</p>
        <p>109303 - production</p>
        <p>109304 - billing</p>
        <p>109305 - delivery</p>
        <p>109306 - admin</p>
        <p>109307 - warehousing</p>
        <p>109308 - management</p>
        <p>password is "pawie2062"</p>-->
    </div>
</div>
@stop