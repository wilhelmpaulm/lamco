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


<form id="mamamia"  class="" action="{{URL::to('delivery/apply-approve-trip-ticket')}}" method="post">
    <div class="row-fluid">

        <div class="span12">
            <h3>Trip Ticket</h3>
        </div>
        <div class="span12">
            <h4>Driver : {{User::find($dq->driver)->last_name}}, {{User::find($dq->driver)->first_name}}</h4> 
            <h4>Truck : {{Truck::find($dq->truck)->name}}</h4>
        </div>
    </div>




    <div class="row-fluid " >
        <div class="span12" >
            <h4>Balance Rolls</h4>
            <table  id="balance_form" width="100%" class="table table-condensed table-bordered table-striped table-hover" >
                <thead>
                    <tr>
                        <th>Destination</th>
                        <th>Sales Invoice No.</th>
                        <!--<th>contents</th>-->
                        <!--<th><button type="button" class="btn btn-success" id="add_balance"><i class="icon-plus-sign-alt"></i></button></th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($dq_d as $dqd)
                    <tr>
                        <td>{{Client::find(Sales_invoice::find($dqd->si_no)->client)->address}}</td>
                        <td>{{$dqd->si_no}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <input type="submit" value="Approve Trip Ticket" />
</form>


<script>
//    $("body").on("click", "#add_balance", function() {
//        var newrow = $("#balance_content tbody").html();
//        $("#balance_form > tbody:last").append(newrow);
//
//    });
//    $("body").on("click", "#remove_balance", function() {
//        $(this).parent().parent().remove();
//
//    });

</script>

@stop