@extends('layouts.purchasing')
@section('main')

<form  class="" data-validate="parsley" action="{{URL::to('purchasing/add-supplier')}}" method="post">
    <div class="row-fluid">
        <div class="span4">
            <label for="name">Name</label>
            <input id="name" required="" class="input-block-level" type="text" name="name" value="" />

            <label for="contacts">Contact</label>
            <input id="contacts" required="" class="input-block-level" type="text" name="contacts" value="" />
            <br>
        </div>
        
        <div class="span4">
            <label for="address">Address</label>
            <textarea id="address" required="" name="address" rows="4" cols="20"></textarea>
        </div>
    </div>

    <div class="row-fluid">
        <button class="btn btn-warning pull-right">Add New Supplier</button>

    </div>

</form>

@stop