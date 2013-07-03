@extends('layouts.sales')
@section('main')


<div class="hero-unit">
    <h1>Hello, {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
    
</div>



@stop