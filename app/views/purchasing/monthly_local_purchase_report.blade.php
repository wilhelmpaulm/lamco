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
                <center>
                <img src="{{URL::asset("images/lamco_header.png")}}" width="500" height="500"></center>
                <div>
                    <!--<p style="float: right; margin-top: -90px; margin-right: 5px;">Date Generated:</p>--> 
                    <!--<p style="float: right; margin-top: -70px; margin-right: 70px;"></p>-->
                    <!--<p style="float: right; margin-top: -70px; margin-right: 70px;">{{$month}}</p>-->
                    <!--<p style="float: right; margin-top: -70px; margin-right: 5px;">{{$year}}</p>-->
                </div>
            </div>

            <div>
                <h3 style="text-align: center">Monthly Local Purchase Report</h3> 
            </div>
            <div>
                <p style="margin-left: 440px; font-weight: bold; font-size: 18px">{{$month}} {{$year}}</p> 
            </div>
            



            <div>

                <style type="text/css">
                    table.myTable { border-collapse:collapse; table-layout: fixed; width: 935px;}
                    th { border:1px solid black; }
                    td { border-bottom: none; border-left: 1px solid black;  text-align: left; word-wrap: break-word; padding: 5px;}

                    .amount {text-align: right}
                </style>
                <!-- Be sure to place the above styles (i.e. everything between the <style></style> tags) into the document 'head' (i.e. between the <head></head> tags. Everything below goes inside the <body></body> tags) -->
                <table class="myTable" style="margin-top: 30px; margin-bottom: 40px;" >
                    <tr>
                        <th style="border-top: none; border-left: none; text-align: left" width="400px">Description</th>
                        <th style="border-top: none; text-align: left" width="100px">Quantity</th>
                        <th style="border-top: none; text-align: right" width="100px">Unit Cost</th>
                        <th style="border-top: none; text-align: right; border-right: none" width="100px">Amount</th>
                    </tr>
                    <?php $tprice = 0?>
                    <?php $tquantity = 0?>
                    @foreach($po_d as $pd)
                    <tr>
                        <td style="border-left: none">{{$pd->paper_type}} {{$pd->weight}} {{$pd->calliper}} {{$pd->dimension}}</td>
                        <td>{{$pd->quantity}}</td>
                        <td style="text-align: right">{{$pd->price}}</td>
                        <td style="text-align: right">{{$pd->price * $pd->quantity}}</td>
                        <?php $tprice += $pd->price * $pd->quantity ?>
                        <?php $tquantity += $pd->quantity ?>
                    </tr>
                    @endforeach
                    

                </table>
            </div>
            
            <div>
                <p style="margin-left: 370px; margin-top: -20px; font-weight: bold">Total Purchases:</p>
                <p style="margin-left: 535px; margin-top: -30px; font-weight: bold">{{$tquantity}}</p>
                <p style="margin-left: 835px; margin-top: -30px; font-weight: bold ;text-align: right">{{$tprice}}</p>
            </div>
            
             <div>
                <p style="margin-top: 20px; float: right"> </p>
            </div>
            
          
        </div>
    </body>
</html>
