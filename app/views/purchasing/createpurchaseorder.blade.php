@extends('layouts.purchasing')
@section('main')

<form id="mamamia"  class="" data-validate="parsley" action="{{URL::to('purchasing/add-purchase-order')}}" method="post">
    <div class="row-fluid">
        <div class="span3">
            <!--<input class="btn " disabled="true" type="text" name="vendor" value="PO no. 879" />-->

  <!--<input class="input-medium" type="text" name="vendor" value="" placeholder="Vendor Papers"/>-->
            <select class="input-large" name="vendor" data-trigger="change" data-required="true">
                @foreach($vendors as $vendor)
                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                @endforeach
            </select>
            <br><br>

        </div>


        <div class="span9">
            <div id="formbody" style="height: 360px; overflow: auto">
                <div id="formrow">
                    <div id="poop" class="row-fluid">
                        <div class="span3">
                            <label for="paper_type">Paper Type</label> 
                            <select id="paper_type" class="input-block-level" name="paper_type[]" data-trigger="change" data-required="true">
                                @foreach($paper_types as $paper_type)
                                <option value="{{$paper_type->type}}">{{$paper_type->type}}</option>
                                @endforeach
                            </select>
                            <label for="calliper">Calliper</label> 
                            <select id="calliper" class="input-block-level" name="calliper[]" data-trigger="change" data-required="true">
                                @foreach($callipers as $calliper)
                                <option value="{{$calliper->calliper}}">{{$calliper->calliper}}</option>
                                @endforeach
                            </select>
                            <!--<input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->
                        </div>
                        <div class="span3">
                            <label for="weight">Weight</label> 
                            <select id="weight" class="input-block-level" name="weight[]" data-trigger="change" data-required="true">
                                @foreach($weights as $weight)
                                <option value="{{$weight->weight}}">{{$weight->weight}}</option>
                                @endforeach
                            </select>
                            <label for="dimension">Dimensions</label> 
                            <select id="dimension" class="input-block-level" name="dimension[]" data-trigger="change" data-required="true">
                                @foreach($dimensions as $dimension)
                                <option value="{{$dimension->dimension}}">{{$dimension->dimension}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="span3">
                            <label for="unit">Unit</label> 
                            <select id="dimension" class="input-block-level" name="unit[]" data-trigger="change" data-required="true">
                                @foreach($units as $unit)
                                <option class="" value="{{$unit->unit}}">{{$unit->unit}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="span2">
                            <label  for="quantity">Quantity</label> 
                            <input id="quantity" class="input-block-level" type="text" name="quantity[]" placeholder="000"  required=""/>
                            <label for="price">Price</label> 
                            <input id="price" class="input-block-level" type="text" name="price[]" placeholder="000.00"  required=""/>
                            <hr>
                            <label for="subtotal">Subtotal</label> 
                            <input id="subtotal"  class="" type="hidden"  name="subtotal[]"  placeholder="000.00"/>
                            <input id="subtotal"  class="input-block-level  " type="text" disabled="true" placeholder="000.00"/>
                            <!--Subtotal: <span id="subtotal">0.00</span>-->
                            <!--<input id="subtotal" class="input-block-level btn btn-inverse " disabled="true" value="0.00" type="text" name="subtotal"/>-->
                        </div>

                    </div>
                    <hr>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span3">
                    <input id="total" class="btn btn-block btn-warning" disabled="true" type="button" value="Total" />
                </div>
                <div class="span3">
                    <input class="btn btn-inverse btn-block" disabled="true" type="button" name="terms" value="Pending" />
                </div>
                <div class="span3">
                    <button id="removerow" class="btn btn-danger pull-left" type="button"><i class="icon-minus-sign-alt"></i></button>
                    <button id="addrow" class="btn btn-success pull-right" type="button" ><i class="icon-plus-sign-alt"></i></button>
                </div>
                <div class="span3">
                    <button class="ladda-button btn btn-info expand-right" type="submit"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                    <!--<input  class="ladda-button btn btn-info expand-right" type="submit" value="Submit" /><span class="ladda-spinner"></span>-->
                </div>
            </div>
        </div>
    </div>

</form>

<script>

    var l = Ladda.create(document.querySelector('.ladda-button'));
    $('form').submit(function() {
        $.notify('Creating your purchase order please wait...', 'info');
        l.start();
    });


    var sum = 0;
    var counter = 0;
    ref();
    function ref() {
        if (counter == 0) {
            $('#removerow').hide();
        } else {
            $('#removerow').show();
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
        $('#formbody').append($('#formrow').html());
        counter++;
        ref();
        $('#total').val(sumjq('input#subtotal'));
        $('input#subtotal').text('0.00');
        $("#mamamia").parsley('addItem', '#poop');
    });
    $('#removerow').click(function() {

        $('#formbody').children($('#formrow')).last().remove();
        $('#formbody').children($('#formrow')).last().remove();
        counter--;
        ref();
        $('#total').val(sumjq('input#subtotal'));
    });
</script>
@stop