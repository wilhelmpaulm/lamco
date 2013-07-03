@extends('layouts.purchasing')
@section('main')



<form class="form-actions" action="{{URL::to('purchasing/create-purchase-order')}}" method="POST">
    <div class="row-fluid">
        <div class="span3">
            <input class="btn " disabled="true" type="text" name="vendor" value="PO no. 879" />
            <input class="btn btn-info" disabled="true" type="text" name="terms" value="Pending" />
            <br>
            <br>
            <input class="input-medium" type="text" name="vendor" value="" placeholder="Vendor Papers"/>
            <!--<input class="input-medium" type="text" name="address" value="" placeholder="1671 Pedro Gil St."/>-->
            <!--<input class="input-medium" type="date" name="date" value="" placeholder="date today"/>-->
            <input class="input-medium" type="text" name="terms" value="" placeholder="30 days"/>
            <br><br>
            
        </div>


        <div class="span9">
            <div id="formbody" style="height: 360px; overflow: auto">
            <div id="formrow">
                <div id="poop" class="row-fluid">
                        <div class="span3">
                            <label for="vendor">Type</label> 
                            <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>
                            <label for="vendor">Calliper</label> 
                            <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>
                        </div>
                        <div class="span3">
                            <label for="vendor">Weight</label> 
                            <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>
                            <label for="vendor">Dimensions</label> 
                            <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>

                        </div>
                        <div class="span3">
                            <label for="vendor">Price</label> 
                            <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>
                        </div>
                        <div class="span3">
                            <label for="vendor">Quantity</label> 
                            <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>
                            <label for="vendor">Subtotal</label> 
                            <input class="input-block-level" type="text" name="terms" value="" placeholder="Vendor Papers"/>
                        </div>
                    
                </div>
                <hr>
            </div>
                <div id="bord"></div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span3">

                </div>
                <div class="span3">

                </div>
                <div class="span3">
                    <button id="removerow" class="btn btn-danger " type="button"><i class="icon-minus-sign-alt"></i></button>
                    <button id="addrow" class="btn btn-success pull-right" type="button" ><i class="icon-plus-sign-alt"></i></button>
                </div>
                <div class="span3">
                    <input  class="btn btn-info pull-right" type="submit" value="Submit" />
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    var counter = 0;
    ref();
    function ref(){
        if(counter == 0){
            $('#removerow').hide();
        }else{
            $('#removerow').show();
        }
    };
    
    $('#addrow').click(function() {
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