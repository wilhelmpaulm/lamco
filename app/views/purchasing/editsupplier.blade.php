@extends('layouts.purchasing')
@section('main')



<ul class="breadcrumb ">
    <li>
        <a href="#">Home</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">Purchasing</a> <span class="divider">/</span>
    </li>
    <li class="active">
        Edit Supplier
    </li>
</ul>
<form  class="" data-validate="parsley" action="{{URL::to('purchasing/apply-edit-supplier')}}" method="post">
    <input id="id" class="input-block-level" type="hidden" name="id" value="{{$supplier->id}}" />
    <div class="row-fluid">
        <div class="span4">
            <label for="name">Name</label>
            <input id="name" class="input-block-level" type="text" name="name" value="{{$supplier->name}}" />

            <label for="contacts">Contact</label>
            <input id="contacts" class="input-block-level" type="text" name="contacts" value="{{$supplier->contacts}}" />
            <br>
        </div>
        
        <div class="span4">
            <label for="address">Address</label>
            <textarea id="address" name="address" rows="4" cols="20">{{$supplier->address}}</textarea>
        </div>
    </div>

    <div class="row-fluid">
        <button class="btn btn-warning pull-right">Submit Changes</button>

    </div>

</form>

@stop