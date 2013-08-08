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
                     <img src="{{URL::asset('images/lamco_header.png')}}" width="500" height="500"></center>
                <div>
                    <p style="float: right; margin-top: -90px; margin-right: 5px;">Date Generated:</p> 
                    <p style="float: right; margin-top: -70px; margin-right: 5px;"><?php echo date('jS \of F Y ');?></p><br>
                    <p style="float: right; margin-top: -70px; margin-right: 5px;"><?php echo date('h:i:s A');?></p>
                </div>
            </div>

            <div>
                <h3 style="text-align: center">Daily Sales Report</h3> 
            </div>
            <div>
                <p style="text-align: center; font-weight: bold; font-size: 18px">{{$month}}/{{$day}}/{{$year}}</p> 
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
                        <th style="border-top: none; border-left: none; text-align: left" width="500px">Description</th>
                        <th style="border-top: none; text-align: left" width="90px">Unit</th>
                        <th style="border-top: none; text-align: left" width="90px">Qty.</th>
                        <th style="border-top: none; text-align: right" width="100px">Unit Cost</th>
                        <th style="border-top: none; text-align: right; border-right: none" width="140px">Amount</th>
                    </tr>
                    
                    <?php 
                    $tTotal =0;
                    $subQuantity = 0;
                    $subTotal = 0;
                    $subTax = 0;
                    $products = DB::select("select * from si_details where month(created_at) = ? and  day(created_at) = ? and  year(created_at) = ? and transaction_type != 'reserve' ", [$month, $day, $year]);
                    
                    ?>
                    
                    @foreach($products as $product)
                        @if($product->transaction_type == 'ordinary')
                            <?php
                                $r = Product::find($product->product);
                            
                                ?>
                            <tr>
                                <td style="border-left: none">{{$r->dimension}} {{$r->paper_type}} {{$r->unit}} </td>
                                <td>{{$r->unit}} </td>
                                <td>{{$product->quantity}} </td>
                                <td style="text-align: right">{{$product->price}}</td>
                                
                                <td style="text-align: right">{{$product->price *  $product->quantity   }}</td>
                            </tr>
                        @endif
                        @if($product->transaction_type == 'special')
                           
                            <tr>
                                <td style="border-left: none">{{$product->dimension}} {{$product->paper_type}} {{$product->unit}} </td>
                                <td>{{$product->unit}} </td>
                                <td>{{$product->quantity}} </td>
                                <td style="text-align: right">{{$product->price}}</td>
                                
                                <td style="text-align: right">{{$product->price *  $product->quantity   }}</td>
                            </tr>
                        @endif
                        
                        <?php 
                            $subQuantity += $product->quantity;
                            $subTotal += $product->price * $product->quantity;
                            
                        ?>
                        
                    @endforeach
                        <?php 
                            $subTax = (($subTotal/100)*12);
                            $tTotal = $subTax + $subTotal;
                        
                        ?>
                </table>
            </div>
            
            <div>
                <p style="margin-left: 400px; margin-top: -20px; font-weight: bold"></p> 
                <p style="margin-left: 510px; margin-top: -30px; font-weight: bold">Subtotal:</p>
                <p style="margin-left: 602px; margin-top: -30px; font-weight: bold ">{{$subQuantity}}</p>
                <p style="margin-left: 830px; margin-top: -30px; text-align: right">{{$subTotal}}</p>
            </div>
            
             <div>
                <p style="margin-left: 730px; font-weight: bold">Sales VAT:</p> 
                <p style="margin-left: 830px; margin-top: -30px; text-align: right ">{{$subTax}}</p>
             </div>
            
            <div>
                <p style="margin-left: 730px; font-weight: bold">Total Sales:</p> 
                <p  style="margin-left: 830px; margin-top: -30px; font-weight: bold; text-align: right">{{$tTotal}}</p>
             </div>
            
            <div>
                <!--<p style="margin-top: 20px; float: right"> Page 9 of 9 </p>-->
            </div>

        </div>
    </body>
</html>
