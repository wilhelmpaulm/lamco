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
<form id="mamamia"  class="" action="{{URL::to('sales/apply-edit-sales-order')}}" method="post">
    <input type="hidden" name="id" value="{{$so->id}}" />

    <div class="row-fluid">
        <div class="span12">
            <select class="input-xxlarge sel2" name="client">
                @foreach($clients as $client)
                <option value="{{$client->id}}" @if($client->id == $so->client)selected=''@endif>{{$client->name}}</option>
                @endforeach
            </select>
            <select class="input-large sel2" name="terms">
                @foreach($terms as $term)
                <option value="{{$term->term}}" @if($client->id == $so->term)selected=''@endif>{{$term->term}}</option>
                @endforeach
            </select>
            <br><br>
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
                            <th width="5%"><button class="btn btn-success" type="button" id="add_ordinary"><i class="icon icon-plus-sign-alt"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($so_d as $sod)
                        @if($sod->transaction_type == "ordinary")
                        <tr>
                    <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="ordinary"/>
                    <input id=""  class="" type="hidden"  name="unit[]" />
                    <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="roll[]" placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="production_type[]" placeholder="000.00"/>
                    <td>
                        <select id="product" class="input-block-level sel2" name="product[]">
                            @foreach($products as $product)
                            <option value="{{$product->id}}" data-price="{{$product->price}}" data-quantity="{{$product->quantity}}" @if($product->id == $sod->product)selected=''@endif>{{$product->paper_type}} {{$product->unit}} {{$product->calliper}} {{$product->dimension}} {{$product->weight}} {{$product->paper_type}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input id="quantity" class="input-medium" type="number" name="quantity[]" required="" placeholder="000" value="{{$sod->quantity}}"/>
                    </td>
                    <td>
                        <input id="price" class="input-medium" type="hidden" name="price[]" required="" placeholder="000" value="{{$sod->price}}"/>
                        <input id="dummyPrice" class="input-medium" type="text" disabled="" name="" required="" placeholder="000" value="{{$sod->price}}"/>
                    </td>
                    <td>
                        <input id="subtotal" class="input-medium" type="hidden" name="subtotal[]" required="" placeholder="000" value="{{$sod->quantity*$sod->price}}"/>
                        <input id="subtotal" class="input-medium" type="text" disabled="" name="" required="" placeholder="000" value="{{$sod->quantity*$sod->price}}"/>
                    </td>
                    <td>
                        <button class="btn btn-danger" type="button" id="remove_row"><i class="icon icon-minus-sign-alt"></i></button>
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
                            <th width="5%"><button class="btn btn-success" type="button" id="add_special"><i class="icon icon-plus-sign-alt"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($so_d as $sod)
                        @if($sod->transaction_type == "special")
                        <tr>
                            <td>
                                <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="special"/>
                                <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
                                <input id=""  class="" type="hidden"  name="roll[]" placeholder="000.00"/>
                                <select id="paper_type" class="input-block-level" name="paper_type[]">
                                    @foreach($paper_types as $paper_type)
                                    <option value="{{$paper_type->type}}" @if($paper_type->type == $sod->paper_type)selected=''@endif>{{$paper_type->type}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="paper_type" class="input-block-level" name="unit[]">
                                    @foreach($units as $unit)
                                    <option value="{{$unit->unit}}" @if($unit->unit == $sod->unit)selected=''@endif>{{$unit->unit}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="paper_type" class="input-block-level" name="calliper[]">
                                    @foreach($callipers as $calliper)
                                    <option value="{{$calliper->calliper}}" @if($calliper->calliper == $sod->calliper)selected=''@endif>{{$calliper->calliper}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="dimension" class="input-block-level" name="weight[]">
                                    @foreach($weights as $weight)
                                    <option value="{{$weight->weight}}" @if($weight->weight == $sod->weight)selected=''@endif>{{$weight->weight}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="dimension" class="input-block-level" name="dimension[]">
                                    @foreach($dimensions as $dimension)
                                    <option value="{{$dimension->dimension}}" @if($dimension->dimension == $sod->dimension)selected=''@endif>{{$dimension->dimension}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="production_type" class="input-block-level" name="production_type[]">
                                    @foreach($production_types as $production_type)
                                    <option value="{{$production_type->type}}" @if($production_type->production_type == $sod->production_type)selected=''@endif>{{$production_type->type}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input id="quantity" class="input-medium" type="number" name="quantity[]" required="" placeholder="000" value="{{$sod->quantity}}"/>
                            </td>
                            <td>
                                <input id="price" class="input-medium" type="number" name="price[]" required="" placeholder="000" value="{{$sod->price}}"/>
                            </td>
                            <td>
                                <input id="subtotal" class="input-medium" type="hidden" name="subtotal[]" required="" placeholder="000" value="{{$sod->quantity*$sod->price}}"/>
                                <input id="subtotal" class="input-medium" type="text" disabled="" name="subtotal[]" required="" placeholder="000" value="{{$sod->quantity*$sod->price}}"/>
                            </td>
                            <td>
                                <button class="btn btn-danger" type="button" id="remove_row"><i class="icon icon-minus-sign-alt"></i></button>
                            </td>
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
                            <!--<th>Price</th>-->
                            <!--<th>Subtotal</th>-->
                            <th width="5%"><button class="btn btn-success" type="button" id="add_reserve"><i class="icon icon-plus-sign-alt"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($so_d as $sod)
                        @if($sod->transaction_type == "reserve")
                        <tr>
                    <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="reserve"/>
                    <input id=""  class="" type="hidden"  name="unit[]" placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="production_type[]" placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="price[]" placeholder="000.00"/>
                    <input id=""  class="" type="hidden"  name="subtotal[]" placeholder="000.00"/>

                    <td>
                        <select id="" class="input-block-level sel2" name="roll[]">
                            @foreach($rolls as $roll)
                            <option value="{{$roll->id}}" data-quantity="{{$roll->quantity}}" @if($roll->id == $sod->roll)selected=''@endif>{{$roll->paper_type}} {{$roll->unit}} {{$roll->calliper}} {{$roll->dimension}} {{$roll->weight}} {{$roll->paper_type}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input id="quantity" min="1" class="input-medium" type="number" name="quantity[]" required="" placeholder="000" value="{{$sod->quantity}}"/>

                    </td>

                    <td>
                        <button class="btn btn-danger" type="button" id="remove_row"><i class="icon icon-minus-sign-alt"></i></button>
                    </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <button class="ladda-button btn btn-warning expand-right pull-right" type="submit"><span class="ladda-label">Submit Changes</span><span class="ladda-spinner"></span></button>
</form>


<div class="hidden">
    <div id="special_content">
        <table>
            <tbody>
                <tr>
            <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="special"/>
            <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="roll[]" placeholder="000.00"/>
            <td>
                <select id="paper_type" class="input-block-level" name="paper_type[]">
                    @foreach($paper_types as $paper_type)
                    <option value="{{$paper_type->type}}">{{$paper_type->type}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select id="paper_type" class="input-block-level" name="unit[]">
                    @foreach($units as $unit)
                    <option value="{{$unit->unit}}">{{$unit->unit}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select id="paper_type" class="input-block-level" name="calliper[]">
                    @foreach($callipers as $calliper)
                    <option value="{{$calliper->calliper}}">{{$calliper->calliper}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select id="dimension" class="input-block-level" name="weight[]">
                    @foreach($weights as $weight)
                    <option value="{{$weight->weight}}">{{$weight->weight}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select id="dimension" class="input-block-level" name="dimension[]">
                    @foreach($dimensions as $dimension)
                    <option value="{{$dimension->dimension}}">{{$dimension->dimension}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select id="production_type" class="input-block-level" name="production_type[]">
                    @foreach($production_types as $production_type)
                    <option value="{{$production_type->type}}" >{{$production_type->type}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input id="quantity" class="input-mini" type="number" name="quantity[]" required="" placeholder="000"/>
            </td>
            <td>
                <input id="price" class="input-medium" type="number" name="price[]" required="" placeholder="000"/>
            </td>
            <td>
                <input id="subtotal" class="input-medium disabled"  type="hidden" name="subtotal[]" required="" placeholder="000"/>
                <input id="subtotal" class="input-medium disabled" type="text" disabled="" name="" required="" placeholder="000"/>
            </td>
            <td>
                <button class="btn btn-danger" type="button" id="remove_row"><i class="icon icon-minus-sign-alt"></i></button>
            </td>
            </tr>
            </tbody>
        </table>


    </div>
    <div id="ordinary_content">
        <table>
            <tbody>
                <tr>
            <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="ordinary"/>
            <input id=""  class="" type="hidden"  name="unit[]" />
            <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="roll[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="production_type[]" placeholder="000.00"/>

            <td>
                <select id="product" class="input-block-level " name="product[]">
                    @foreach($products as $product)
                    <option value="{{$product->id}}" data-price="{{$product->price}}" data-quantity="{{$product->quantity}}">{{$product->paper_type}} {{$product->unit}} {{$product->calliper}} {{$product->dimension}} {{$product->weight}} {{$product->paper_type}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input id="quantity" min="1" max="" class="input-medium" type="number" name="quantity[]" required="" placeholder="000"/>
            </td>
            <td>
                <input id="price" min="1" max="" class="input-medium" type="hidden" name="price[]" required="" placeholder="000"/>
                <input id="dummyPrice" min="1" max="" class="input-medium" type="text" disabled="" name="" required="" placeholder="000"/>
            </td>
            <td>
                <input id="subtotal" class="input-medium" type="hidden" name="subtotal[]" required="" placeholder="000"/>
                <input id="subtotal" class="input-medium" type="text" disabled="" name="subtotal[]" required="" placeholder="000"/>
            </td>
            <td>
                <button class="btn btn-danger" type="button" id="remove_row"><i class="icon icon-minus-sign-alt"></i></button>
            </td>
            </tr>
            </tbody>
        </table>


    </div>
    <div id="reserve_content">
        <table>
            <tbody>
                <tr>
            <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="reserve"/>
            <input id=""  class="" type="hidden"  name="unit[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="production_type[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="price[]" placeholder="000.00"/>
            <input id=""  class="" type="hidden"  name="subtotal[]" placeholder="000.00"/>

            <td>
                <select id="roll" class="input-block-level sel2" name="roll[]">
                    @foreach($rolls as $roll)
                    <option value="{{$roll->id}}" data-quantity="{{$roll->quantity}}">{{$roll->paper_type}} {{$roll->unit}} {{$roll->calliper}} {{$roll->dimension}} {{$roll->weight}} {{$roll->paper_type}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input id="quantity" min="1" class="input-medium" type="number" name="quantity[]" required="" placeholder="000"/>
            </td>

            <td>
                <button class="btn btn-danger" type="button" id="remove_row"><i class="icon icon-minus-sign-alt"></i></button>
            </td>
            </tr>
            </tbody>
        </table>


    </div>




</div>
<script>
    $('body').on('change', '#product', function() {
        var max = $(this).find('option:selected').data('quantity');
//        $('#formrow  .quantity').attr('max',max);
        $(this).parent().siblings('div').children('#quantity').attr('max', max);
//       console.log($(this).find('option:selected').data('max'));
    });
    
    var l = Ladda.create(document.querySelector('.ladda-button'));
    $('form').submit(function() {
        $.notify('Creating a new sales order please wait...', 'info');
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

    $('body').on('change', 'select#product', function() {
       var quantity = $(this).find("option:selected").data("quantity");
       var price = $(this).find("option:selected").data("price");
       $(this).parent().siblings().find('#quantity').attr('max', quantity);
       $(this).parent().siblings().find('#price').val(price);
       $(this).parent().siblings().find('#dummyPrice').val(price);
    });
    $('body').on('change', 'select#roll', function() {
       var quantity = $(this).find("option:selected").data("quantity");
       $(this).parent().siblings().find('#quantity').attr('max', quantity);
    });
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