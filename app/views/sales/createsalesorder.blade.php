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
<form id="mamamia"  class="" action="{{URL::to('sales/add-sales-order')}}" method="post">
    <div class="row-fluid">
        <div class="span3">
            <select class="input-large" name="client">
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
            <select class="input-large" name="terms">
                @foreach($terms as $term)
                <option value="{{$term->term}}">{{$term->term}}</option>
                @endforeach
            </select>
            <br><br>
            <button id="addordinary" class="btn btn-success btn-block pull-right" type="button" ><i class="icon-plus-sign-alt"></i> Add Ordinary </button>
            <button id="addspecial" class="btn btn-success btn-block pull-right" type="button" ><i class="icon-plus-sign-alt"></i>   Add Special </button>
            <button id="addreserve" class="btn btn-success btn-block pull-right" type="button" ><i class="icon-plus-sign-alt"></i> Reserve Roll</button>
            <button id="removerow" class="btn btn-danger btn-block pull-left" type="button"><i class="icon-minus-sign-alt"></i></button>

        </div>


        <div class="span9">
            <div id="formbody" style="height: 360px; overflow: auto">
                <div id="formrow">

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

                </div>
                <div class="span3">
                    <!--<input  class="btn btn-info btn-block" type="submit" value="Submit" />-->
                       <button class="ladda-button btn btn-info expand-right" type="submit"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>


                </div>
            </div>
        </div>
    </div>

</form>


<div class="hidden">

    <div id="f_special" >
        <div class="formitem span12" class="row-fluid ">
                <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="special"/>
            <div class="span3">
                <label for="paper_type">Paper Type</label> 
                <select id="paper_type" class="input-block-level" name="paper_type[]">
                    @foreach($paper_types as $paper_type)
                    <option value="{{$paper_type->type}}">{{$paper_type->type}}</option>
                    @endforeach
                </select>
                <label for="calliper">Calliper</label> 
                <select id="calliper" class="input-block-level" name="calliper[]">
                    @foreach($callipers as $calliper)
                    <option value="{{$calliper->calliper}}">{{$calliper->calliper}}</option>
                    @endforeach
                </select>
                <!--<input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>-->
            </div>
            <div class="span3">
                <label for="weight">Weight</label> 
                <select id="weight" class="input-block-level" name="weight[]">
                    @foreach($weights as $weight)
                    <option value="{{$weight->weight}}">{{$weight->weight}}</option>
                    @endforeach
                </select>
                <label for="dimension">Dimensions</label> 
                <select id="dimension" class="input-block-level" name="dimension[]">
                    @foreach($dimensions as $dimension)
                    <option value="{{$dimension->dimension}}">{{$dimension->dimension}}</option>
                    @endforeach
                </select>
            </div>
            <div class="span2">
            </div>
            <div class="span3">
                <label  for="quantity">Quantity</label> 
                <input id="quantity" class="input-block-level" type="number" name="quantity[]" required="" placeholder="000"/>
                <label for="price">Price</label> 
                <input id="price" class="input-block-level" type="number" name="price[]" required="" placeholder="000.00"/>
                <hr>
                <label for="subtotal">Subtotal</label> 
                <input id="subtotal"  class="" type="hidden"  name="subtotal[]"  placeholder="000.00"/>
                <input id="subtotal"  class="input-block-level  " type="text" disabled="true" placeholder="000.00"/>
                <hr>
                <!--Subtotal: <span id="subtotal">0.00</span>-->
                <!--<input id="subtotal" class="input-block-level btn btn-inverse " disabled="true" value="0.00" type="text" name="subtotal"/>-->
                 <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
                 <input id=""  class="" type="hidden"  name="roll[]" placeholder="000.00"/>
            </div>
        </div>
    </div>
    <div id="f_ordinary" >
        <div class="formitem span12" >
                <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="ordinary"/>
            <div class="span8">
                <label >Product</label> 
                <select id="product" class="input-block-level" name="product[]">
                    @foreach($products as $product)
                    <option value="{{$product->id}}" data-max="{{$product->quantity}}">{{$product->paper_type}} {{$product->dimension}} {{$product->weight}} {{$product->calliper}}</option>
                    @endforeach
                </select>
                <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="roll[]" placeholder="000.00"/>
            </div>
            <div class="span3">
                <label  for="quantity">Quantity</label> 
                <input id="quantity" class="input-block-level" type="number" name="quantity[]" required="" placeholder="000"/>
                <label for="price">Price</label> 
                <input id="price" class="input-block-level" type="number" name="price[]" required="" placeholder="000.00"/>
                <hr>
                <label for="subtotal">Subtotal</label> 
                <input id="subtotal"  class="" type="hidden"  name="subtotal[]"  placeholder="000.00"/>
                <input id="subtotal"  class="input-block-level  " type="text" disabled="true" placeholder="000.00"/>
                <hr>
            </div>
        </div>
    </div>
    <div id="f_reserve" >
        
        <div class="formitem span12" >
                <input id="transaction_type"  class="" type="hidden"  name="transaction_type[]" value="reserve"/>
            <div class="span8">
                <label >Roll</label> 
                <select id="roll" class="input-block-level" name="roll[]">
                    @foreach($rolls as $roll)
                    <option value="{{$roll->id}}" data-max="{{$roll->quantity}}">{{$roll->paper_type}} {{$roll->dimensions}} {{$roll->weight}} {{$roll->calliper}}</option>
                    @endforeach
                </select>
                <input id=""  class="" type="hidden"  name="paper_type[]" placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="calliper[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="dimension[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="weight[]"  placeholder="000.00"/>
                <input id=""  class="" type="hidden"  name="product[]" placeholder="000.00"/>
            </div>
            <div class="span3">
                <label  for="quantity">Quantity</label> 
                <input id="quantity" class="input-block-level quantity" type="number" name="quantity[]"  required="" placeholder="000"/>
                <label for="price">Price</label> 
                <input id="price" class="input-block-level" type="number" name="price[]" required="" placeholder="000.00"/>
                <hr>
                <label for="subtotal">Subtotal</label> 
                <input id="subtotal"  class="" type="hidden"  name="subtotal[]"  placeholder="000.00"/>
                <input id="subtotal"  class="input-block-level  " type="text" disabled="true" placeholder="000.00"/>
                <hr>
            </div>
        </div>
    </div>

</div>



<!--container hidded-->
</div>
<script>
    $('body').on('change','#formrow select',function(){
        var max = $(this).find('option:selected').data('max');
//        $('#formrow  .quantity').attr('max',max);
        $(this).parent().siblings('div').children('#quantity').attr('max',max);
//       console.log($(this).find('option:selected').data('max'));
    }); 
       
    
    
    
    var l = Ladda.create(document.querySelector('.ladda-button'));
    $('form').submit(function() {
        $.notify('Creating a new sales order pleasse wait...', 'info');
        l.start();
    });

//    $('#poop').hide();


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

    $('body').on('click', '#addspecial', function() {
        $('#formrow').append($('#f_special').html());
        counter++;
        ref();
        $('#total').val(sumjq('input#subtotal'));
        $('input#subtotal').text('0.00');
    });
    $('body').on('click', '#addordinary', function() {
        $('#formrow').append($('#f_ordinary').html());
        counter++;
        ref();
        $('#total').val(sumjq('input#subtotal'));
        $('input#subtotal').text('0.00');
        
        
    });
    $('body').on('click', '#addreserve', function() {
        $('#formrow').append($('#f_reserve').html());
        counter++;
        ref();
        $('#total').val(sumjq('input#subtotal'));
        $('input#subtotal').text('0.00');
    });
    
    $('body').on('click', '#removerow', function() {

//        $('#formbody').children($('#formrow#poop')).last().remove();
//        $('#formrow').last().remove();
//        $('#formbody').children($('#formrow')).children($('#poop')).last().remove();
        $('#formrow').children().last().remove();
//        $('#formrow')
        counter--;
        ref();
        $('#total').val(sumjq('input#subtotal'));
//        $('body').find($('#formbody')).children($('#formrow')).last().remove();
//        alert($('#var').html());
    });
</script>


@stop