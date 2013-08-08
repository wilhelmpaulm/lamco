@extends('layouts.billing')
@section('main')



<form id="mamamia"  class="" action="{{URL::to('billing/apply-edit-sales-invoice')}}" method="post">
<!--<form id="mamamia"  class="" action="" method="get">-->
    <div class="row-fluid">
        <input type="hidden" name="id" value="{{$si->id}}" />


        <div class="span9">
            <h3>Sales Invoice No.  {{$si->id}}</h3>
            <h5>Sales Order No. {{$si->so_no}}</h4>

        </div>
        <div class="span3">
        </div>
    </div>


    <div class="row-fluid ">
        <div class="span12">

            <!--<h4>Products Produced</h4>-->
            <table  class="table table-condensed table-bordered table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Dimension</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody >

                    @foreach($si_d as $sid)
                    @if($sid->transaction_type == "ordinary")
                    <?php $p = Product::find($sid->product) ?>
                    <tr>
                        <td >Ordinary</td>
                        <td >{{$sid->id}}</td>
                        <td >{{$p->paper_type}} {{$p->weight}} {{$p->calliper}}</td>
                        <td>{{$p->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$p->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    @endif
                    @endforeach 

                    @foreach($si_d as $sid)   
                    @if($sid->transaction_type == "special")
                    <tr>
                        <td >Special</td>
                        <td >{{$sid->id}}</td>
                        <td >{{$sid->paper_type}} {{$sid->weight}} {{$sid->calliper}}</td>
                        <td>{{$sid->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$sid->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    @endif
                    @endforeach 

                    @foreach($si_d as $sid) 
                    @if($sid->transaction_type == "reserve")
                    <?php $r = Roll::find($sid->roll) ?>
                    <tr>
                        <td >Reserve</td>
                        <td >{{$sid->id}}</td>
                        <td >{{$r->paper_type}} {{$r->weight}} {{$r->calliper}}</td>
                        <td>{{$r->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$r->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    @endif
                    @endforeach

                    <tr>
                        <td colspan="6"></td>
                        <td>Subtotal</td>
                        <td>{{$si->subtotal}}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>VAT Rate</td>
                        <td>12%</td>
                        <td>VAT </td>
                        <td>{{$si->vat}}</td>
                    </tr>

                    <tr>
                        <td colspan="6"></td>
                        <td>Total</td>
                        <td>{{$si->total}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


    <div class="row-fluid">
        <div class="span12">

            <a href="{{URL::to('billing/view-sales-invoices')}}"><button class="pull-right btn" type="button">Back</button></a>
            <!--<input class="btn pull-right"  type="button" hre value="Back" />-->
        </div>
    </div>
</form>

<div class="hidden">


</div>

<script>
    sumjq = function(selector) {
        var sum = 0;
        $(selector).each(function() {
//            sum += Number($(this).val());
            sum += Number($(this).text());
        });
        return sum;
    };

    $(".subtotal").val(sumjq(".amount"));
    $(".vat").val($("#subtotal").val() / 100 * 12);
    $("#vat").val($("#subtotal").val() / 100 * 12);
    $(".total").val(Number($("#subtotal").val()) + Number($("#vat").val()));



</script>

@stop