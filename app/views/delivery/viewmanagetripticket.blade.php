@extends('layouts.delivery')
@section('main')


<form id="mamamia"  class="" action="{{URL::to('delivery/apply-manage-trip-ticket')}}" method="post">
    <div class="row-fluid">

        <input type="hidden" name="id" value="{{$dq->id}}" />
        <div class="span12">
            <h3>Trip Ticket</h3>
        </div>
        <div class="span12">
            <h4>Driver : {{User::find($dq->driver)->last_name}}, {{User::find($dq->driver)->first_name}}</h4> 
            <h4>Truck : {{Truck::find($dq->truck)->name}}</h4>
        </div>
    </div>




    <div class="row-fluid " >
        <div class="span2"></div>
        <div class="span8" >
            <table  id="balance_form" width="100%" class="table table-condensed table-bordered table-striped table-hover" >
                <thead>
                    <tr>
                        <th>Destination</th>
                        <th>Sales Invoice No.</th>
                        <th>Status</th>
                        <!--<th></th>-->
                        <!--<th>contents</th>-->
                        <!--<th><button type="button" class="btn btn-success" id="add_balance"><i class="icon-plus-sign-alt"></i></button></th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($dq_d as $dqd)
                    <input type='hidden' name='dqd_id[]' value="{{$dqd->id}}">
                    <tr>
                        <td>{{Client::find(Sales_invoice::find($dqd->si_no)->client)->address}}</td>
                        <td>{{$dqd->si_no}}</td>
                        <td ><span class="lead">{{$dqd->status}} </span>
                            @if($dqd->status == 'in delivery')
                            <div class="divider divider-vertical"></div>
                            <select name="status[]">
                                <option value="completed" >Completed</option>
                                <option value="reschedule">Reschedule</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            @endif
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            
            
@if($dq->status != 'completed')
            <input type="submit" class="btn btn-warning pull-right" value="Submit Changes" />
        
        @endif
        </div>
        <div class="span2"></div>

    </div>


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