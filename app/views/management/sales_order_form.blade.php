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
                    <h3 style="float: right; margin-top: -100px">SALES ORDER FORM</h3>
                    <h4 style="float: right; margin-top: -60px; margin-right: 60px;">SO NO.</h4> <p style="float: right; margin-top: -60px; font-weight: bold; font-size: 16px; ">{{$so->id}}</p>
                    <p style="float: right; margin-top: -35px; margin-right: 65px;"></p> <p style="float: right; margin-top: -35px; margin-right: -2px;">{{$so->created_at}}</p>
                    <p style="float: right; margin-top: -10px; margin-right: 65px;">TERMS:</p> <p style="float: right; margin-top: -10px; margin-right: -120px;">{{$so->terms}}</p>
                </div>
            </div>

            <hr>

            <div>
                <h4>CLIENT:</h4> <p style="margin-top: -30px; margin-left: 85px; font-size: 15px">{{Client::find($so->client)->name}}</p>            
            </div>
            <div>
                <h4>ADDRESS:</h4> <p style="margin-top: -30px; margin-left: 110px; font-size: 15px">{{Client::find($so->client)->address}}</p>

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
                        <th width="300px">PRODUCT DESCRIPTION</th>
                        <th width="130px">DIMENSION</th>
                        <th width="100px">QUANTITY</th>
                        <th width="50px">UNIT</th>
                        <th width="100px">UNIT PRICE</th>
                        <th width="100px">AMOUNT</th>
                    </tr>
                    <?php $tTotal = 0; ?>

                    @foreach($so_d as $sid)
                    @if($sid->transaction_type == "ordinary")
                    <?php $p = Product::find($sid->product); ?>
                    <tr>
                        <td >Ordinary</td>
                        <td >{{$p->paper_type}} {{$p->weight}} {{$p->calliper}}</td>
                        <td>{{$p->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$p->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    <?php $tTotal += $sid->quantity * $sid->price; ?>
                    @endif
                    @endforeach 

                    @foreach($so_d as $sid)   
                    @if($sid->transaction_type == "special")
                    <tr>
                        <td >Special</td>
                        <td >{{$sid->paper_type}} {{$sid->weight}} {{$sid->calliper}}</td>
                        <td>{{$sid->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$sid->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    <?php $tTotal += $sid->quantity * $sid->price; ?>
                    @endif
                    @endforeach 

                    @foreach($so_d as $sid) 
                    @if($sid->transaction_type == "reserve")
                    <?php $r = Roll::find($sid->roll) ?>
                    <tr>
                        <td >Reserve</td>
                        <td >{{$r->paper_type}} {{$r->weight}} {{$r->calliper}}</td>
                        <td>{{$r->dimension}}</td>
                        <td>{{$sid->quantity}}</td>
                        <td>{{$r->unit}}</td>
                        <td>{{$sid->price}}</td>
                        <td class="amount">{{$sid->quantity * $sid->price}}</td>
                    </tr>
                    <?php $tTotal += $sid->quantity * $sid->price; ?>
                    @endif
                    @endforeach


                </table>
            </div>


            <div>
                <h4>Special Instructions:</h4>
                <h4 style="float: right; margin-top: -30px; margin-right: 100px;">Total:</h4> <p style="float: right; margin-top: -30px; margin-right: 10px;"><b>{{$tTotal}}</b></p>
            </div>

            <div>
                <input type="text" name="Special Instruction" value="" size="300" style="width: 450px; height: 100px;" />

            </div>


            <div>
                <h4 style="margin-left: 540px; margin-top: -80px">Prepared By:</h4> 
            </div>

            <div>
                <h4 style="margin-left: 780px; margin-top: -30px;">Approved By:</h4>
            </div>
            <?php $prepared_by = User::find($so->created_by) ?>
            <?php $approved_by = User::find($so->approved_by) ?>
            <p style=" margin-left: 795px">{{$prepared_by->last_name}}, {{$prepared_by->first_name}}</p>
            @if($so->approved_by != null)
            <p style=" margin-left: 555px; margin-top: -30px">{{$approved_by->last_name}}, {{$approved_by->first_name}}</p>
            @else
            <p style=" margin-left: 555px; margin-top: -30px"></p>

            @endif

            <hr>
            <hr>
            <hr>

            @if($so->status == "pending")
            <form action="{{URL::to('management/approve-sales-order')}}" method="POST">
                <input class="" type="hidden" name="id" value="{{$so->id}}" />
                <input class="btn btn-success pull-right" type="submit" value="Approve Sales Order" />
            </form>
            <form action="{{URL::to('management/reject-sales-order')}}" method="POST">
                <input class="" type="hidden" name="id" value="{{$so->id}}" />
                <input class="btn btn-danger pull-right" type="submit" value="Reject Sales Order" />
            </form>
            @endif
        </div>

    </body>
</html>
