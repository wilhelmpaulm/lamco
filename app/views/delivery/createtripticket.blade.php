@extends('layouts.delivery')
@section('main')
<ul class="breadcrumb ">
    <li>
        <a href="#">Home</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">Production</a> <span class="divider">/</span>
    </li>
    <li class="active">
        View Production Record
    </li>
</ul>


<form id="mamamia"  class="" action="{{URL::to('delivery/add-trip-ticket')}}" method="post">
    <div class="row-fluid">

        <div class="span12">
            <h3>Trip Ticket</h3>
        </div>
        <div class="span6">
            <p>Driver</p>
            <select name="driver">
                @foreach($drivers as $driver)
                <option value="{{$driver->id}}">{{$driver->last_name}}, {{$driver->first_name}}</option>
                @endforeach
            </select>
           
        </div>
        <div class="span6">
           
            <p>Truck</p>
            <select name="truck">
                @foreach($trucks as $truck)
                <option value="{{$truck->id}}">{{$truck->name}} : {{$truck->plate}}</option>
                @endforeach
            </select>
        </div>
    </div>




    <div class="row-fluid " >
        <div class="span2"></div>
        <div class="span8" >
            <h4>Balance Rolls</h4>
            <table  id="balance_form" width="100%" class="table table-condensed table-bordered table-striped table-hover" >
                <thead>
                    <tr>
                        <!--<th>Destination</th>-->
                        <th>Sales Invoice No.</th>
                        <!--<th>contents</th>-->
                        <th><button type="button" class="btn btn-success" id="add_balance"><i class="icon-plus-sign-alt"></i></button></th>
                    </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
            <input type="submit" class="btn btn-warning" value="Create Trip Ticket" />
        </div>
        <div class="span2"></div>
    </div>


</form>

<div class="hidden">
    <div id="balance_content">
        <table>
            <tbody>
                <tr>
                    <!--<td><input type="text" name="destination[]" value="" /></td>-->
                    <td>
                        <select name="si_no[]"  class="input-block-level">
                            @foreach($si as $s)
                            <option value="{{$s->id}}" data-destination="{{Client::find($s->client)->address}}" data-client="{{$s->client}}">{{$s->id}} | {{Client::find($s->client)->name}} | {{Client::find($s->client)->address}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" id="remove_balance"><i class="icon-minus-sign-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<script>
    $("body").on("click", "#add_balance", function() {
        var newrow = $("#balance_content tbody").html();
        $("#balance_form > tbody:last").append(newrow);

    });
    $("body").on("click", "#remove_balance", function() {
        $(this).parent().parent().remove();

    });

</script>

@stop