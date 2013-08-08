@extends('layouts.production')
@section('main')


<form id="mamamia"  class="" action="{{URL::to('production/approve-production-record')}}" method="post">
    <div class="row-fluid">
        <input type="hidden" name="id" value="{{$pr->id}}" />


        <div class="span9">
            <h3>Machine : {{Machine::find($mq->machine)->name}}</h3>
        </div>
        <div class="span3">
            <h4>Production Record No. {{$pr->id}}</h4>
        </div>
    </div>


    <div class="row-fluid ">
        <div class="span12">

            <h4>Products Produced</h4>
            <table  width="100%" class="table table-condensed table-bordered table-striped" >
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Paper Type</th>
                        <th>Dimension</th>
                        <th>Weight</th>
                        <th>Calliper</th>
                        <th>Warehouse</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody >

                    @foreach($pr_d as $p_d)
                    @if($p_d->transaction_type == "product")



                    <tr>
                        <td >{{$p_d->quantity}}</td>
                        <td >{{$p_d->unit}}</td>
                        <td>{{$p_d->paper_type}}</td>
                        <td>{{$p_d->dimension}}</td>
                        <td>{{$p_d->weight}}</td>
                        <td>{{$p_d->calliper}}</td>
                        <td>{{$p_d->warehouse}}</td>
                        <td>{{$p_d->location}}</td>


<!--<td>{{$p_d->location}}</td>-->
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="row-fluid " >
        <div class="span12" >

            <h4>Rolls Used</h4>
            <table width="100%" class="table table-condensed table-bordered table-striped table-hover" >
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Description</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody >


                    @foreach($pr_d as $p_d)
                    @if($p_d->transaction_type == "roll")
                    <?php $r = Roll::find($p_d->roll) ?>

                    <tr>
                        <td >{{$p_d->quantity}}</td>
                        <td >{{$r->unit}}</td>
                        <td>{{$r->paper_type}} {{$r->dimension}} {{$r->weight}} {{$r->calliper}}</td>
                        <td>{{$r->warehouse}} / {{$r->location}}</td>

                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <div class="row-fluid " >
        <div class="span12" >
            <h4>Balance Rolls</h4>
            <table  id="balance_form" width="100%" class="table table-condensed table-bordered table-striped table-hover" >
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Paper_type</th>
                        <th>Dimension</th>
                        <th>Weight</th>
                        <th>Calliper</th>
                        <th>Warehouse</th>
                        <th>Location</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($pr_d as $p_d)
                    @if($p_d->transaction_type == "balance")



                    <tr>
                        <td >{{$p_d->quantity}}</td>
                        <td >{{$p_d->unit}}</td>
                        <td>{{$p_d->paper_type}}</td>
                        <td>{{$p_d->dimension}}</td>
                        <td>{{$p_d->weight}}</td>
                        <td>{{$p_d->calliper}}</td>
                        <td>{{$p_d->warehouse}}</td>
                        <td>{{$p_d->location}}</td>


<!--<td>{{$p_d->location}}</td>-->
                    </tr>
                    @endif
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>


    <input type="submit" class="btn btn-warning" value="Approve Production Record" />
</form>

<div class="hidden">
    <div id="balance_content">
        <table><tbody>
                <tr>
            <input type="hidden" name="roll[]" value="" />
            <input type="hidden" name="transaction_type[]" value="balance" />
            <td><input type="number" name="quantity[]" value="" /></td>
            <td >
                <select name="unit[]" class="input-block-level">
                    @foreach($units as $unit)
                    <option>{{$unit->unit}}</option>
                    @endforeach
                </select>
            </td>
            <td >
                <select name="paper_type[]" class="input-block-level">
                    @foreach($paper_types as $paper_type)
                    <option>{{$paper_type->type}}</option>
                    @endforeach
                </select>
            </td>
            <td >
                <input type="text" name="dimension[]" value="" />
            </td>
            <td >
                <select name="weight[]" class="input-block-level">
                    @foreach($weights as $weight)
                    <option>{{$weight->weight}}</option>
                    @endforeach
                </select>
            </td>
            <td >
                <select name="calliper[]" class="input-block-level">
                    @foreach($callipers as $calliper)
                    <option>{{$calliper->calliper}}</option>
                    @endforeach
                </select>
            </td>
            <td >
                <select name="warehouse[]" class="input-block-level">
                    @foreach($warehouses as $warehouse)
                    <option>{{$warehouse->warehouse}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="location[]" class="input-block-level">
                    @foreach($locations as $location)
                    <option>{{$location->location}}</option>
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