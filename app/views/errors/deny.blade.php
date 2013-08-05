@extends('layouts.error')
@section('main')


<div class="span6 offset3">
    <div class="hero-unit text-center">
        <hr>
        <h1 class="">YOU ARE NOT ALLOWED</h1>
        <h1 class="">IN THIS PAGE!</h1>
        <h3 class="">this is being recorded</h3>
        <hr>
        <a href="{{URL::to('login')}}" class="btn btn-info">Back to where I came from</a>
        <hr>
        
    
    </div>
</div>
@stop