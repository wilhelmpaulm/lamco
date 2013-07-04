@extends('layouts.purchasing')
@section('main')



<form id="mamamia"  class="form-actions" action="" method="get">
    <div class="row-fluid">
        <div class="span3">
            <input class="btn " disabled="true" type="text" name="vendor" value="PO no. 879" />
            <input class="btn btn-info" disabled="true" type="text" name="terms" value="Pending" />
            <br>
            <br>
            <!--<input class="input-medium" type="text" name="vendor" value="" placeholder="Vendor Papers"/>-->
            <select class="input-large" name="vendor">
                @foreach($vendors as $vendor)
                <option value="{{$vendor->name}}">{{$vendor->name}}</option>
                @endforeach
            </select>

            <!--<input class="input-medium" type="text" name="address" value="" placeholder="1671 Pedro Gil St."/>-->
            <!--<input class="input-medium" type="date" name="date" value="" placeholder="date today"/>-->
            <!--<input class="input-medium" type="text" name="terms" value="" placeholder="30 days"/>-->
            <br><br>

        </div>


        <div class="span9">
            <div id="formbody" style="height: 360px; overflow: auto">
                <div id="formrow">
                    <div id="poop" class="row-fluid">
                        <div class="span3">
                            <label for="paper_type">Paper Type</label> 
                            <!--<input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->
                            <select class="input-block-level" name="paper_type[]">
                                @foreach($paper_types as $paper_type)
                                <option value="{{$paper_type->type}}">{{$paper_type->type}}</option>
                                @endforeach
                            </select>
                            <label for="calliper">Calliper</label> 
                            <select class="input-block-level" name="calliper[]">
                                @foreach($callipers as $calliper)
                                <option value="{{$calliper->calliper}}">{{$calliper->calliper}}</option>
                                @endforeach
                            </select>
                            <!--<input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->
                        </div>
                        <div class="span3">
                            <label for="weight">Weight</label> 
                            <select class="input-block-level" name="weight[]">
                                @foreach($weights as $weight)
                                <option value="{{$weight->weight}}">{{$weight->weight}}</option>
                                @endforeach
                            </select>
                            <label for="dimension">Dimensions</label> 
                            <select class="input-block-level" name="dimension[]">
                                @foreach($dimensions as $dimension)
                                <option value="{{$dimension->dimension}}">{{$dimension->dimension}}</option>
                                @endforeach
                            </select>
                            <!--                            <label for="vendor">Weight</label> 
                                                        <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>
                                                        <label for="vendor">Dimensions</label> 
                                                        <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->

                        </div>
                        <div class="span2">
                        </div>
                        <div id="calc"  class="span3">
                            <label for="quantity">Quantity</label> 
                            <input id="quantity" class="input-block-level" type="text" name="quantity[]" placeholder="000.00"/>
                            <label for="price">Price</label> 
                            <input id="price" class="input-block-level" type="text" name="price[]" placeholder="000.00"/>
                            <hr>
                            <label for="total">Subtotal</label> 
                            <input id="subtotal" class="input-block-level btn btn-inverse " disabled="true" type="text" name="total[]"  placeholder="0000000.00"/>
                        </div>

                    </div>
                    <hr>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span3">
                    <input id="total" class="btn btn-info" type="button" value="Calculate" />
                </div>
                <div class="span3">

                </div>
                <div class="span3">
                    <button id="removerow" class="btn btn-danger " type="button"><i class="icon-minus-sign-alt"></i></button>
                    <button id="addrow" class="btn btn-success" type="button" ><i class="icon-plus-sign-alt"></i></button>
                </div>
                <div class="span3">
                    <input  class="btn btn-info pull-right" type="submit" value="Submit" />
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    var sum = 0;
    var counter = 0;
    ref();
    function ref() {
        if (counter == 0) {
            $('#removerow').hide();
        } else {
            $('#removerow').show();
        }
    };

    sumjq = function(selector) {
        var sum = 0;

        $(selector).each(function() {
            sum += Number($(this).val());
        });
        return sum;
    };


    $('#total').on('click', function() {
        alert($('#subtotal').last().val());
    });


    $('#mamamia').on('keyup', '#quantity', function() {
        pri = $(this).siblings('#price').val();
        qua = $(this).val();

        $(this).siblings('#subtotal').val((qua * pri).toFixed(2));

    });

    $('#mamamia').on('keyup', '#price', function() {
        qua = $(this).siblings('#quantity').val();
        pri = $(this).val();

        $(this).siblings('#subtotal').val((qua * pri).toFixed(2));

    });



    $('#addrow').click(function() {
//        $('#formbody').append($('#formrow').html());
        $('#formbody').append($('#formrow').html());
        counter++;
        ref();
//        alert($('#var').html());
    });
    $('#removerow').click(function() {

        $('#formbody').children($('#formrow')).last().remove();
        $('#formbody').children($('#formrow')).last().remove();
        counter--;
        ref();
//        $('body').find($('#formbody')).children($('#formrow')).last().remove();
//        alert($('#var').html());
    });
</script>


@stop