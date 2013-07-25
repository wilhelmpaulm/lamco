@extends('layouts.production')
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
<form id="mamamia"  class="" action="{{URL::to('production/apply-edit-job-order')}}" method="post">
    <div class="row-fluid">
        <div class="span3">
            <!--<input class="btn " disabled="true" type="text" name="vendor" value="PO no. 879" />-->

            <input id=""  class="" type="hidden"  name="production_type" value="{{$mq->production_type}}"/>
            <input type="hidden" name="id" value="{{$mq->id}}" />
            <label for="client">Client</label> 
            <input class="input-block-level" type="text" disabled="" name="client" value="{{$so->client}}" />
            <label for="machine">Job Order ID</label> 
            <input class="input-block-level" type="text" disabled="" name="id" value="{{$mq->id}}" />

            <label for="machine">Machine</label> 
            <select class="input-large input-block-level" name="machine">
                @foreach($machines as $machine)
                <option value="{{$machine->id}}" >{{$machine->name}}</option>
                @endforeach
            </select>

            <br><br>
<!--            <button id="addordinary" class="btn btn-success btn-block pull-right" type="button" ><i class="icon-plus-sign-alt"></i> Add Ordinary </button>
            <button id="addspecial" class="btn btn-success btn-block pull-right" type="button" ><i class="icon-plus-sign-alt"></i>   Add Special </button>-->
            <button id="addreserve" class="btn btn-success btn-block pull-right" type="button" ><i class="icon-plus-sign-alt"></i> Reserve Roll</button>
            <button id="removerow" class="btn btn-danger btn-block pull-left" type="button"><i class="icon-minus-sign-alt"></i></button>

        </div>


        <div class="span9">
            <div id="formbody" style="height: 360px; overflow: auto">
                <div id="formrow">
                    @foreach($mq_d as $mq_d)
                    @if($mq_d->transaction_type == "product")
                    <div class="formitem span12 row-fluid" >
                        <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="product"/>
                        <div class="span3">
                            <label for="paper_type">Paper Type</label> 
                            <input class="input-block-level" type="hidden"  name="paper_type[]" value="{{$mq_d->paper_type}}" />
                            <input class="input-block-level" disabled="" type="text"  name="paper_type[]" value="{{$mq_d->paper_type}}" />
                            <label for="calliper">Calliper</label> 
                            <input class="input-block-level" type="hidden"  name="calliper[]" value="{{$mq_d->calliper}}" />
                            <input class="input-block-level" disabled="" type="text"  name="calliper[]" value="{{$mq_d->calliper}}" />

<!--<input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->
                        </div>
                        <div class="span3">
                            <label for="weight">Weight</label> 
                            <input class="input-block-level" type="hidden"  name="weight[]" value="{{$mq_d->weight}}" />
                            <input class="input-block-level" disabled="" type="text"  name="weight[]" value="{{$mq_d->weight}}" />

                            <label for="dimension">Dimensions</label> 
                            <input class="input-block-level" type="hidden"  name="dimension[]" value="{{$mq_d->dimension}}" />
                            <input class="input-block-level" disabled="" type="text"  name="dimension[]" value="{{$mq_d->dimension}}" />
                        </div>
                        <div class="span2">
                            <label for="unit">Unit</label> 
                            <input class="input-block-level" type="hidden"  name="unit[]" value="{{$mq_d->unit}}" />
                            <input class="input-block-level" disabled="" type="text"  name="unit[]" value="{{$mq_d->unit}}" />
                            
                        </div>
                        <div class="span3">
                            <label  for="quantity">Quantity</label> 
                            <input id="quantity" class="input-block-level" type="hidden" name="quantity[]" value="{{$mq_d->quantity}}" placeholder="000"/>
                            <input id="quantity" class="input-block-level" disabled="" type="text" name="quantity[]" value="{{$mq_d->quantity}}" placeholder="000"/>
                            <!--<label for="price">Price</label>--> 
                            <input id="price" class="input-block-level" type="hidden" name="price[]" value="{{$mq_d->price}}" placeholder="000.00"/>
                            <!--<input id="price" class="input-block-level" disabled="" type="text" name="price[]" value="{{$mq_d->price}}" placeholder="000.00"/>-->
                            <hr>
                            <!--<label for="subtotal">Subtotal</label>--> 
                            <input id="subtotal"  class="" type="hidden"  name="subtotal[]"  placeholder="000.00"/>
                            <!--<input id="subtotal"  class="input-block-level  " type="text" disabled="true" placeholder="000.00"/>-->
                            <hr>
                            <!--Subtotal: <span id="subtotal">0.00</span>-->
                            <!--<input id="subtotal" class="input-block-level btn btn-inverse " disabled="true" value="0.00" type="text" name="subtotal"/>-->
                            <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
                            <input id=""  class="" type="hidden"  name="roll[]" placeholder="000.00"/>
                        </div>

                    </div>
                    @elseif($mq_d->transaction_type == "roll")
                    <div class="formitem span12 row-fluid" >
                        <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="roll"/>
                        <div class="span8">
                            <label >Roll</label> 
                            <select id="roll" class="input-block-level" name="roll[]">
                                @foreach($rolls as $roll)
                                <option value="{{$roll->id}}" data-max="{{$roll->quantity}}"  @if($mq_d->roll == $roll->id)selected=''@endif >{{$roll->paper_type}} {{$roll->dimensions}} {{$roll->weight}} {{$roll->calliper}}</option>
                                @endforeach
                            </select>

                            <input id=""  class="" type="hidden"  name="subtotal[]" placeholder="000.00"/>
                            <input id=""  class="" type="hidden"  name="price[]" placeholder="000.00"/>
                            <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
                            <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
                            <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
                            <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                            <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
                        </div>
                        <div class="span3">
                            <label  for="quantity">Quantity</label> 
                            <input id="quantity" class="input-block-level quantity" type="number" name="quantity[]" value="{{$mq_d->quantity}}"  required="" placeholder="000"/>

                            <hr>
                        </div>
                    </div>

                    @endif
                    <hr>



                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row-fluid span12">
                <div class="span3">
                    <input id="total" class="btn btn-block btn-warning" disabled="true" type="button" value="Total" />
                </div>
                <div class="span3">
                    <input class="btn btn-inverse btn-block" disabled="true" type="button" name="terms" value="Pending" />
                </div>
                <div class="span3">

                </div>
                <div class="span3">
                    <button class="ladda-button btn btn-info expand-right" type="submit"><span class="ladda-label">Create Job Order</span><span class="ladda-spinner"></span></button>
                   <!--<input  class="btn btn-info btn-block" type="submit" value="Submit" />-->
                </div>
            </div>
        </div>
    </div>

</form>








<!--container hidded-->
<div class="hidden">


    <div id="f_reserve" >

        <div class="formitem span12 row-fluid" >
            <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="roll"/>
            <div class="span8">
                <label >Roll</label> 
                <select id="roll" class="input-block-level" name="roll[]">
                    @foreach($rolls as $roll)
                    <option value="{{$roll->id}}" data-max="{{$roll->quantity}}">{{$roll->paper_type}} {{$roll->dimensions}} {{$roll->weight}} {{$roll->calliper}}</option>
                    @endforeach
                </select>
                <input id=""  class="" type="hidden"  name="subtotal[]" placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="price[]" placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="unit[]"  placeholder="000.00"/>

                <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>

            </div>
            <div class="span3">
                <label  for="quantity">Quantity</label> 
                <input id="quantity" class="input-block-level quantity" type="number" name="quantity[]"  required="" placeholder="000"/>

                <hr>
            </div>
        </div>
    </div>

</div>
<script>
    $('body').on('click', '#formrow select', function() {
        var max = $(this).find('option:selected').data('max');
        $(this).parent().siblings('div').children('#quantity').attr('max', max);
    });

    var l = Ladda.create(document.querySelector('.ladda-button'));
    $('form').submit(function() {
        $.notify('Applying the changes please wait...', 'info');
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


    $('body').on('click', '#addreserve', function() {
        $('#formrow').append($('#f_reserve').html());
        counter++;
        ref();
        $('#total').val(sumjq('input#subtotal'));
        $('input#subtotal').text('0.00');
    });

    $('body').on('click', '#removerow', function() {
        $('#formrow').children().last().remove();
        counter--;
        ref();
        $('#total').val(sumjq('input#subtotal'));
    });
</script>


@stop