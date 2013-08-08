<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        {{HTML::style('css/bootstrap.min.css')}}
    </head>
    <body>
        <div class="container">
            <br>
            <div>
                <img src="{{URL::asset('images/lamco_header.png')}}" width="500" height="500">
                <div>
                    <h3 style="float: right; margin-top: -100px">PURCHASE ORDER</h3>
                    <h4 style="float: right; margin-top: -60px; margin-right: 60px;">PO NO.</h4> <p style="float: right; margin-top: -60px; font-weight: bold; font-size: 16px;">{{$po->id}}</p>
                    <p style="float: right; margin-top: -35px; margin-right: 65px;"></p> <p style="float: right; margin-top: -35px; margin-right: -2px;"> {{$po->created_at}}</p>
                    <!--<p style="float: right; margin-top: -10px; margin-right: 65px;">TERMS:</p> <p style="float: right; margin-top: -10px; margin-right: -120px;"> 99/99/99</p>-->
                </div>
            </div>

            <hr>

            <div>
                <h4>SUPPLIER:</h4> <p style="margin-top: -30px; margin-left: 110px; font-size: 15px">{{Supplier::find($po->supplier)->name}}</p>            
            </div>
            <div>
                <h4>ADDRESS:</h4> <p style="margin-top: -30px; margin-left: 110px; font-size: 15px">{{Supplier::find($po->supplier)->address}}</p>

            </div>



            <div>

                <style type="text/css">
                    table.myTable { border-collapse:collapse; table-layout: fixed; width: 935px;}
                    th { border:1px solid black; }
                    td { border:1px solid black;  text-align: left; word-wrap: break-word; padding: 5px;}

                    .amount {text-align: right}
                </style>
                <!-- Be sure to place the above styles (i.e. everything between the <style></style> tags) into the document 'head' (i.e. between the <head></head> tags. Everything below goes inside the <body></body> tags) -->
                <table class="myTable" style="margin-top: 30px; margin-bottom: 40px;" >
                    <tr>
                        <th width="370px">ROLL DESCRIPTION</th>
                        <th width="100px">WEIGHT</th>
                        <th width="80px">SIZE</th>
                        <th width="100px">QUANTITY</th>
                        <th width="60px">UNIT</th>
                        <th width="100px">UNIT PRICE</th>
                        <th style="text-align: right" width="100px">AMOUNT</th>
                    </tr>
                    <?php
                    $tTotal = 0;
                    ?>


                    @foreach($po_d as $pod)
                    <tr>
                        <td>{{$pod->paper_type}} {{$pod->calliper}}</td>
                        <td>{{$pod->weight}}</td>
                        <td>{{$pod->dimension}}</td>
                        <td>{{$pod->quantity}}</td>
                        <td>{{$pod->unit}}</td>
                        <td>{{$pod->price}}</td>
                        <td style="text-align: right">{{$pod->quantity * $pod->price}}</td>
                    </tr>

                    <?php
                    $tTotal += $pod->quantity * $pod->price;
                    ?>
                    @endforeach

                </table>
            </div>


            <div>
                <h4>Special Instructions:</h4>
                <h4 style="float: right; margin-top: -30px; margin-right: 100px;">Total:</h4>
                <p style="float: right; margin-top: -30px; margin-right: 10px;"><b>{{$tTotal}}</b></p>
            </div>

            <div>
                <input type="text" name="Special Instruction" value="" size="300" style="width: 450px; height: 100px;" />

            </div>

            <div>
                <h4>RECEIVING REPORT NO.</h4> <p style="margin-top: -30px; margin-left: 230px"> 999999</p>
            </div>

            <div>
                <h4 style="margin-left: 480px; margin-top: -30px">Prepared By:</h4> 
            </div>



            <?php $prepared_by = User::find($po->created_by) ?>
            <?php $approved_by = User::find($po->approved_by) ?>

            <p style="margin-left: 495px">{{$prepared_by->last_name}}, {{$prepared_by->first_name}}</p>

            <div>
                <h4 style="margin-left: 780px; margin-top: -60px">Approved By:</h4> 
            </div>


            <p style=" margin-left: 795px"></p>
            @if($po->approved_by != null)
            <p style=" margin-left: 795px">{{$approved_by->last_name}}, {{$approved_by->first_name}}</p>
            @else
            <p style=" margin-left: 795px"></p>

            @endif

            <!--                    <form action="{{URL::to('management/approve-purchase-order')}}" method="POST">
                                    <input class="" type="hidden" name="id" value="{{$po->id}}" />
                                    <input class="btn btn-success btn-block" type="submit" value="Approve" />
            
                                </form>-->
            @if($po->status == "pending")
            <hr>
            <hr>
            <hr>
            <form action="{{URL::to('management/approve-purchase-order')}}" method="POST">
                <input class="" type="hidden" name="id" value="{{$po->id}}" />
                <input class="btn btn-success " type="submit" value="Approve Purchase Order" />

            </form>
            @endif
        </div>
    </body>
</html>
