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
                    <h3 style="float: right; margin-top: -100px">SALES INVOICE</h3>
                    <h4 style="float: right; margin-top: -60px; margin-right: 60px;">SI NO.</h4> <p style="float: right; margin-top: -60px; font-weight: bold; font-size: 16px; ">{{$si->id}}</p>
                    <p style="float: right; margin-top: -35px; margin-right: 65px;"></p> <p style="float: right; margin-top: -35px; margin-right: -2px;">{{$si->created_at}}</p>
                    <p style="float: right; margin-top: -10px; margin-right: 65px;">TERMS:</p> <p style="float: right; margin-top: -10px; margin-right: -120px;">{{$si->terms}}</p>
                </div>
            </div>

            <hr>

            <div>
                <h4>BILL TO:</h4> <p style="margin-top: -30px; margin-left: 85px; font-size: 15px">{{Client::find($si->client)->name}}</p>            
            </div>
            <div>
                <h4>DELIVER TO:</h4> <p style="margin-top: -30px; margin-left: 125px; font-size: 15px">{{Client::find($si->client)->address}}</p>

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
                        <th width="80px"></th>
                        <th width="80px">PRODUCT CODE</th>
                        <th width="300px">PRODUCT DESCRIPTION</th>
                        <th width="130px">DIMENSION</th>
                        <th width="100px">QUANTITY</th>
                        <th width="50px">UNIT</th>
                        <th width="80px">UNIT PRICE</th>
                        <th width="100px">AMOUNT</th>
                    </tr>
                    
                    @foreach($si_d as $sid)
                    @if($sid->transaction_type == "ordinary")
                    <?php $p = Product::find($sid->product) ?>
                    <tr>
                        <td >Ordinary</td>
                        <td >{{$sid->id}}</td>
                        <td >{{$p->paper_type}} {{$p->weight}} {{$p->calliper}}</td>
                        <td>{{$p->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$p->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    @endif
                    @endforeach 

                    @foreach($si_d as $sid)   
                    @if($sid->transaction_type == "special")
                    <tr>
                        <td >Special</td>
                        <td >{{$sid->id}}</td>
                        <td >{{$sid->paper_type}} {{$sid->weight}} {{$sid->calliper}}</td>
                        <td>{{$sid->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$sid->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    @endif
                    @endforeach 

                    @foreach($si_d as $sid) 
                    @if($sid->transaction_type == "reserve")
                    <?php $r = Roll::find($sid->roll) ?>
                    <tr>
                        <td >Reserve</td>
                        <td >{{$sid->id}}</td>
                        <td >{{$r->paper_type}} {{$r->weight}} {{$r->calliper}}</td>
                        <td>{{$r->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$r->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    @endif
                    @endforeach



                </table>
            </div>


            <div>
                <h4>Special Instructions:</h4>
                <p style="float: right; margin-right: 100px;">SUBTOTAL:</p> <p style="float: right; margin-right: -175px">{{$si->subtotal}}</p>

            </div>

            <!--            <div>
                            <p style="float: right; margin-right: 100px;">SUBTOTAL:</p> <p style="float: right; margin-right: -175px">ZZZ,Z99.99</p>
                        </div>-->

<!--            <p style="float: right; margin-right: -175px">ZZZ,Z99.99</p>-->

            <div>
                <p style="margin-left: 765px;">VAT RATE:</p> <p style="float: right; margin-top: -30px; margin-right: 33px">12%</p>
            </div>

<!--            <p style="float: right; margin-top: -30px; margin-right: 33px">Z.Z9%</p>-->

            <div>
                <p style="margin-left: 805px;">VAT:</p> <p style="float: right; margin-top: -30px">{{$si->vat}}</p>
            </div>

<!--            <p style="float: right; margin-top: -30px">ZZZ,Z99.99</p>-->

            <div>
                <p style="margin-left: 790px; font-weight: bold; font-size: 16px">Total:</p> <p style="float: right ;margin-top: -30px;margin-left: 870px; font-weight: bold; font-size: 15px">{{$si->total}}</p>
            </div>


            <div>
                <input type="text" name="Special Instruction" value="" size="300" style="width: 450px; height: 100px; margin-top: -130px" />

            </div>

            <div>
                <h4>SALES ORDER NO.</h4> <p style="margin-top: -30px; margin-left: 180px">{{$si->so_no}}</p>
            </div>


            <div>
                <h4 style="margin-left: 650px; margin-top: -30px">Prepared By:</h4> 
            </div>
            <?php $prepared_by = User::find($si->created_by)?>
            <p style="margin-top:0px; margin-left: 665px">{{$prepared_by->last_name}}, {{$prepared_by->first_name}}</p>

            
            


        </div>
    </body>
</html>
