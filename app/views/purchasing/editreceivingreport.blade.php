@extends('layouts.purchasing')
@section('main')


<ul class="breadcrumb balon">
    <li>
        <a href="#">Home</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">Purchasing</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">Edit Purchase Order</a> <span class="divider">/</span>
    </li>
    <li class="active">
        Receiving Report #{{$rr->id}}
    </li>
</ul>
<form id="mamamia"  class="" action="{{URL::to('purchasing/apply-edit-receiving-report')}}" method="post">
    <div class="row-fluid">
        <div class="span3">
            <label>RR number</label> 
            <input class="btn "  type="hidden" name="id" value="{{$rr->id}}" />
            <input class="btn " disabled="true" type="btn" name="id" value="{{$rr->id}}" />
            <hr>
  <!--<input class="input-medium" type="text" name="vendor" value="" placeholder="Vendor Papers"/>-->
            <label for="vendor">Vendor</label> 
            <select class="input-large" name="vendor">
                <option value="{{$rr->vendor}}">{{$rr->vendor}}</option>
                @foreach($vendors as $vendor)
                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                @endforeach
            </select>
            <br><br>
        </div>
        <div class="span9">
            <div id="formbody" style="height: 360px; overflow: auto">
                @foreach($rr_d as $rr_d)
                <div id="formrow">
                    <div id="poop" class="row-fluid">
                        <div class="span3">
                            <label for="paper_type">Paper Type</label> 
                            <select id="paper_type" class="input-block-level" name="paper_type[]">
                                <option value="{{$rr_d->paper_type}}">{{$rr_d->paper_type}}</option>
                                @foreach($paper_types as $paper_type)
                                <option value="{{$paper_type->type}}">{{$paper_type->type}}</option>
                                @endforeach
                            </select>
                            <label for="calliper">Calliper</label> 
                            
                            <select id="calliper" class="input-block-level" name="calliper[]">
                                <option value="{{$rr_d->calliper}}">{{$rr_d->calliper}}</option>
                                @foreach($callipers as $calliper)
                                <option value="{{$calliper->calliper}}">{{$calliper->calliper}}</option>
                                @endforeach
                            </select>
                            <!--<input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->
                        </div>
                        <div class="span3">
                            <label for="weight">Weight</label> 
                            <select id="weight" class="input-block-level" name="weight[]">
                                <option value="{{$rr_d->weight}}">{{$rr_d->weight}}</option>
                                @foreach($weights as $weight)
                                <option value="{{$weight->weight}}">{{$weight->weight}}</option>
                                @endforeach
                            </select>
                            <label for="dimension">Dimensions</label> 
                            <select id="dimension" class="input-block-level" name="dimension[]">
                                <option value="{{$rr_d->dimension}}">{{$rr_d->dimension}}</option>
                                @foreach($dimensions as $dimension)
                                <option value="{{$dimension->dimension}}">{{$dimension->dimension}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="span2">
                            <label for="warehouse">Warehouse</label> 
                            <select id="warehouse" class="input-block-level" name="warehouse[]">
                                <option value="{{$rr_d->warehouse}}">{{$rr_d->warehouse}}</option>
                                @foreach($warehouses as $warehouse)
                                <option value="{{$warehouse->warehouse}}">{{$warehouse->warehouse}}</option>
                                @endforeach
                            </select>
                            <label for="location">Location</label> 
                            <select id="location" class="input-block-level" name="location[]">
                                <option value="{{$rr_d->location}}">{{$rr_d->location}}</option>
                                @foreach($locations as $location)
                                <option value="{{$location->location}}">{{$location->location}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="span2">
                            <label for="unit">Units</label> 
                            <select id="unit" class="input-block-level" name="unit[]">
                                <option value="{{$rr_d->unit}}">{{$rr_d->unit}}</option>
                                @foreach($units as $unit)
                                <option value="{{$unit->unit}}">{{$unit->unit}}</option>
                                @endforeach
                            </select>
                            <label  for="quantity">Quantity</label> 
                            <input id="quantity" class="input-block-level" type="text" name="quantity[]" placeholder="000" value="{{$rr_d->quantity}}"/>
                          </div>

                    </div>
                    <hr>
                </div>
                @endforeach
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span3">
                    <!--<input id="total" class="btn btn-block btn-warning" disabled="true" type="button" value="Total" />-->
                </div>
                <div class="span3">
                    <input class="btn btn-inverse btn-block" disabled="true" type="button" name="terms" value="Pending" />
                </div>
                <div class="span3">
<!--                    <button id="removerow" class="btn btn-danger pull-left" type="button"><i class="icon-minus-sign-alt"></i></button>
                    <button id="addrow" class="btn btn-success pull-right" type="button" ><i class="icon-plus-sign-alt"></i></button>-->
                </div>
                <div class="span3">
                    <input  class="btn btn-info btn-block" type="submit" value="Submit" />
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