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
<form  class="" data-validate="parsley" action="{{URL::to('admin/add-user')}}" method="post">
    <div class="row-fluid">
        
    </div>

</form>

@stop