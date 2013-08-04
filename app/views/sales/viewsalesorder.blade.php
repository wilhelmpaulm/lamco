@extends('layouts.sales')
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

    <div class="row-fluid">
        <div class="span12">
            <h2 >Client: {{Client::find($so->client)->name}}</h2>
            <h2 >Terms: {{$so->terms}}</h2>
        </div>
    </div>
    <div class="row-fluid">


        <div class="span12">
            <h3>Ordinary Order Form</h3>
            <!--<hr>-->
            <div>
                <table border="2" class="table table-bordered table-condensed" id="ordinary_form">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($so_d as $sod)
                        @if($sod->transaction_type == "ordinary")
                        <tr>

                            <td>
                                <?php $product = Product::find($sod->product) ?>
                                {{$product->paper_type}} {{$product->unit}} {{$product->calliper}} {{$product->dimension}} {{$product->weight}} {{$product->paper_type}}
                            </td>
                            <td>
                                {{$sod->quantity}}
                            </td>
                            <td>
                                {{$sod->price}}
                            </td>
                            <td>
                                {{$sod->quantity*$sod->price}}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div class="row-fluid">
        <!--<div class="span2"></div>-->
        <div class="span12">
            <h3>Special Order Form</h3>
            <!--<hr>-->
            <div>
                <table border="2" class="table table-bordered table-condensed" id="special_form">
                    <thead>
                        <tr>
                            <th>Paper Type</th>
                            <th>Unit</th>
                            <th>Calliper</th>
                            <th>Weight</th>
                            <th>Dimensions</th>
                            <th>Production Type</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($so_d as $sod)
                        @if($sod->transaction_type == "special")
                        <tr>
                            <td>{{$sod->paper_type}}</td>
                            <td>{{$sod->unit}}</td>
                            <td>{{$sod->calliper}}</td>
                            <td>{{$sod->weight}}</td>
                            <td>{{$sod->dimension}}</td>
                            <td>{{$sod->production_type}}</td>
                            <td>{{$sod->quantity}}</td>
                            <td>{{$sod->price}}</td>
                            <td>{{$sod->quantity*$sod->price}}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!--<div class="span2"></div>-->
    </div>

    <div class="row-fluid">
        <div class="span8 ">
            <h3>Reserve Roll</h3>
            <!--<hr>-->
            <div>
                <table border="2" class="table table-bordered table-condensed" id="reserve_form">
                    <thead>
                        <tr>
                            <th>Roll</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($so_d as $sod)
                        @if($sod->transaction_type == "reserve")
                        <tr>

                            <td>
                                <?php $roll = Roll::find($sod->roll) ?>
                                {{$roll->paper_type}} {{$roll->unit}} {{$roll->calliper}} {{$roll->dimension}} {{$roll->weight}} {{$roll->paper_type}}
                            </td>
                            <td>{{$sod->quantity}}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form action="{{URL::to('sales/approve-sales-order')}}" method="POST">
        <input class="" type="hidden" name="id" value="{{$so->id}}" />
        <input class="btn btn-success " type="submit" value="Approve Sales Order" />
    </form>
    <form action="{{URL::to('sales/reject-sales-order')}}" method="POST">
        <input class="" type="hidden" name="id" value="{{$so->id}}" />
        <input class="btn btn-danger " type="submit" value="Reject Sales Order" />
    </form>


</div>
<script>
    $('body').on('change', '#formrow select', function() {
        var max = $(this).find('option:selected').data('max');
//        $('#formrow  .quantity').attr('max',max);
        $(this).parent().siblings('div').children('#quantity').attr('max', max);
//       console.log($(this).find('option:selected').data('max'));
    });

    var l = Ladda.create(document.querySelector('.ladda-button'));
    $('form').submit(function() {
        $.notify('Applying changes to sales order pleasse wait...', 'warning');
        l.start();
    });

    $("body").on("click", "#add_special", function() {
        var newrow = $("#special_content tbody").html();
        $("#special_form > tbody:last").append(newrow);
    });
    $("body").on("click", "#add_ordinary", function() {
        var newrow = $("#ordinary_content tbody").html();
        $("#ordinary_form > tbody:last").append(newrow);
    });
    $("body").on("click", "#add_reserve", function() {
        var newrow = $("#reserve_content tbody").html();
        $("#reserve_form > tbody:last").append(newrow);
    });
    $("body").on("click", "#remove_row", function() {
        $(this).parent().parent().remove();
    });

    var sum = 0;
    var counter = 0;

    sumjq = function(selector) {
        var sum = 0;
        $(selector).each(function() {
            sum += Number($(this).val());
        });
        return sum;
    };

    $('body').on('keyup', '#quantity', function() {
        pri = $(this).parent().siblings().find('input#price').val();
        qua = $(this).val();
        $(this).parent().siblings().find('input#subtotal').val((qua * pri).toFixed(2));
        $(this).parent().siblings().find('input#subtotal').text((qua * pri).toFixed(2));
    });

    $('#mamamia').on('keyup', '#price', function() {
        qua = $(this).parent().siblings().find('input#quantity').val();
        pri = $(this).val();
        $(this).parent().siblings().find('input#subtotal').val((qua * pri).toFixed(2));
        $(this).parent().siblings().find('input#subtotal').text((qua * pri).toFixed(2));
    });
</script>


@stop