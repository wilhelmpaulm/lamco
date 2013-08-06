@extends('layouts.warehousing')
@section('main')


<ul class="breadcrumb balon">
    <li>
        <a href="#">Home</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">Purchasing</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">View Purchase Order</a> <span class="divider">/</span>
    </li>
    <li class="active">
        PO# {{$po->id}}
    </li>
</ul>
    <div class="row-fluid">
        <div class="span3">
            <label>PO number</label> 
            <input class="input-block-level" disabled="true" type="text" name="id" value="{{$po->id}}" />
            <hr>
            
  <!--<input class="input-medium" type="text" name="vendor" value="" placeholder="Vendor Papers"/>-->
            <label for="vendor">Vendor</label> 
             <input class="input-block-level" disabled="true" type="text" name="id" value="{{$po->supplier}}" />
            
            <br><br>

        </div>


        <div class="span9">
            <div id="formbody" style="height: 360px; overflow: auto">
                @foreach($po_d as $po_d)
                <div id="formrow">
                    <div id="poop" class="row-fluid">
                        <div class="span3">
                            <label for="paper_type">Paper Type</label> 
                            <input class="input-block-level" disabled="true" type="text" name="id" value="{{$po_d->paper_type}}" />
                            
                            <label for="calliper">Calliper</label> 
                            <input class="input-block-level" disabled="true" type="text" name="id" value="{{$po_d->calliper}}" />
                            <!--<input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->
                        </div>
                        <div class="span3">
                            
                            <label for="weight">Weight</label> 
                            <input class="input-block-level" disabled="true" type="text" name="id" value="{{$po_d->weight}}" />
                            
                            <label for="dimension">Dimensions</label> 
                            <input class="input-block-level" disabled="" type="text" name="id" value="{{$po_d->dimension}}" />
                            </select>

                        </div>
                        <div class="span2">
                            <label  for="unit">Units</label> 
                            <input id="quantity" class="input-block-level" disabled="" type="text" name="quantity[]" placeholder="000" value="{{$po_d->unit}}"/>
                        </div>
                        <div class="span3">
                            <label  for="quantity">Quantity</label> 
                            <input id="quantity" class="input-block-level" disabled="" type="text" name="quantity[]" placeholder="000" value="{{$po_d->quantity}}"/>
                            <label for="price">Price</label> 
                            <input id="price" class="input-block-level"  disabled="" type="text" name="price[]" placeholder="000.00" value="{{$po_d->price}}"/>
                            <hr>
                            <label for="subtotal">Subtotal</label> 
                            <input id="subtotal"  class="" type="hidden"   name="subtotal[]"  placeholder="000.00" />
                            <input id="subtotal"  class="btn btn-info" type="text" disabled="true" placeholder="000.00" value="{{$po_d->total}}"/>
                            <!--Subtotal: <span id="subtotal">0.00</span>-->
                            <!--<input id="subtotal" class="input-block-level btn btn-inverse " disabled="true" value="0.00" type="text" name="subtotal"/>-->
                        </div>

                    </div>
                    <hr>
                </div>
                    @endforeach
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span3">
                    <input id="total" class="btn btn-block btn-warning" disabled="true" type="button" value="Total" />
                </div>
                <div class="span3">
                    <input class="btn btn-inverse btn-block" disabled="true" type="button" name="terms" value="{{$po->status}}" />
                </div>
                <div class="span3">
                    <!--<button id="removerow" class="btn btn-danger pull-left" type="button"><i class="icon-minus-sign-alt"></i></button>-->
                    <!--<button id="addrow" class="btn btn-success pull-right" type="button" ><i class="icon-plus-sign-alt"></i></button>-->
                </div>
                <div class="span3">
                    <a  class="btn btn-info btn-block"  href="{{URL::to('warehousing/view-purchase-orders')}}">Back</a>
                </div>
            </div>
        </div>
    </div>


<script>
    var sum = 0;
    var counter = 0;
    ref();
    function ref() {
        if (counter == 0) {
            $('#removerow').hide();
//            $('input#subtotal').text('0.00');
        } else {
            $('#removerow').show();
//            $('input#subtotal').text('0.00');
        }
    }
    ;

    sumjq = function(selector) {
        var sum = 0;

        $(selector).each(function() {
            sum += Number($(this).val());
        });
        return sum;
    };
    $('#total').val(sumjq('input#subtotal'));

//    $('#total').on('click', function() {
////        alert($('input#subtotal').each().val());
//            console.log(sumjq('input#subtotal'));
//        
////        console.log($('input#subtotal').each(function(i, obj){
////            console.log($(this).val());
////        }));
//    });


    $('#mamamia').on('keyup', '#quantity', function() {
        pri = $(this).siblings('#price').val();
        qua = $(this).val();

        $(this).siblings('#subtotal').val((qua * pri).toFixed(2));
        $(this).siblings('#subtotal').text((qua * pri).toFixed(2));
        $('#total').val(sumjq('input#subtotal'));
    });

    $('#mamamia').on('keyup', '#price', function() {
        qua = $(this).siblings('#quantity').val();
        pri = $(this).val();

        $(this).siblings('#subtotal').val((qua * pri).toFixed(2));
        $(this).siblings('#subtotal').text((qua * pri).toFixed(2));
        $('#total').val(sumjq('input#subtotal'));

    });



    $('#addrow').click(function() {
//        $('#formbody').append($('#formrow').html());
        $('#formbody').append($('#formrow').html());
        counter++;
        ref();
        $('#total').val(sumjq('input#subtotal'));
        $('input#subtotal').text('0.00');
//        alert($('#var').html());
    });
    $('#removerow').click(function() {

        $('#formbody').children($('#formrow')).last().remove();
        $('#formbody').children($('#formrow')).last().remove();
        counter--;
        ref();
        $('#total').val(sumjq('input#subtotal'));
//        $('body').find($('#formbody')).children($('#formrow')).last().remove();
//        alert($('#var').html());
    });
</script>


@stop