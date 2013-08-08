@extends('layouts.sales')
@section('main')


<form  class="" data-validate="parsley" action="{{URL::to('sales/apply-edit-client')}}" method="post">
    <input id="id" class="input-block-level" type="hidden" name="id" value="{{$client->id}}" />
    <div class="row-fluid">
        <div class="span4">
            <label for="name">Name</label>
            <input id="name" class="input-block-level" type="text" name="name" value="{{$client->name}}" />

            <label for="contacts">Contact</label>
            <input id="contacts" class="input-block-level" type="text" name="contacts" value="{{$client->contacts}}" />
            <br>
        </div>
        
        <div class="span4">
            <label for="address">Address</label>
            <textarea id="address" name="address" rows="4" cols="20">{{$client->address}}</textarea>
        </div>
    </div>

    <div class="row-fluid">
        <button class="btn btn-warning pull-right">Submit Changes</button>

    </div>

</form>

@stop