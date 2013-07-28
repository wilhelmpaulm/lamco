@extends('layouts.delivery')
@section('main')


<div class="">
    <h1>Hello, {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
    
</div>



@stop