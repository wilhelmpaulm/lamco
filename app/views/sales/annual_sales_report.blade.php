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
                    <p style="float: right; margin-top: -70px; margin-right: 5px;"><?php echo date('jS \of F Y '); ?></p><br>
                    <p style="float: right; margin-top: -70px; margin-right: 5px;"><?php echo date('h:i:s A'); ?></p>
                </div>
            </div>

            <div>
                <h3 style="text-align: center">Annual Sales Report</h3> 
            </div>
            <div>
                <p style="text-align: center; font-weight: bold; font-size: 18px">{{$year}}</p> 
            </div>

            <div>

                <style type="text/css">
                    table.myTable { border-collapse:collapse; table-layout: fixed; width: 935px;}
                    th { border:1px solid black; }
                    td { border-bottom: none; border-left: 1px solid black;  text-align: left; word-wrap: break-word; padding: 5px;}

                    .amount {text-align: right}
                </style>
                <?php
              
                $subQuantity = 0;
                $subTotal = 0;
                $subTax = 0;
                $jan = DB::select("select * from si_details where month(created_at) = 1 and  year(created_at) = ? and transaction_type != 'reserve' ", [ $year]);
                $feb = DB::select("select * from si_details where month(created_at) = 2 and  year(created_at) = ? and transaction_type != 'reserve' ", [$year]);
                $mar = DB::select("select * from si_details where month(created_at) = 3 and  year(created_at) = ? and transaction_type != 'reserve' ", [ $year]);
                $apr = DB::select("select * from si_details where month(created_at) = 4 and  year(created_at) = ? and transaction_type != 'reserve' ", [$year]);
                $may = DB::select("select * from si_details where month(created_at) = 5 and  year(created_at) = ? and transaction_type != 'reserve' ", [$year]);
                $jun = DB::select("select * from si_details where month(created_at) = 6 and  year(created_at) = ? and transaction_type != 'reserve' ", [ $year]);
                $jul = DB::select("select * from si_details where month(created_at) = 7 and  year(created_at) = ? and transaction_type != 'reserve' ", [ $year]);
                $aug = DB::select("select * from si_details where month(created_at) = 8 and  year(created_at) = ? and transaction_type != 'reserve' ", [ $year]);
                $sep = DB::select("select * from si_details where month(created_at) = 9 and  year(created_at) = ? and transaction_type != 'reserve' ", [ $year]);
                $oct = DB::select("select * from si_details where month(created_at) = 10 and  year(created_at) = ? and transaction_type != 'reserve' ", [ $year]);
                $nov = DB::select("select * from si_details where month(created_at) = 11 and  year(created_at) = ? and transaction_type != 'reserve' ", [$year]);
                $dec = DB::select("select * from si_details where month(created_at) = 12 and  year(created_at) = ? and transaction_type != 'reserve' ", [$year]);

                $tJan = 0.0;
                $tFeb = 0.0;
                $tMar = 0.0;
                $tApr = 0.0;
                $tMay = 0.0;
                $tJun = 0.0;
                $tJul = 0.0;
                $tAug = 0.0;
                $tSep = 0.0;
                $tOct = 0.0;
                $tNov = 0.0;
                $tDec = 0.0;
                $tTotal = 0.0;
                
                
                
                foreach ($jan as $j) {
                      
                        $tJan += $j->total;
                        $tTotal += $j->total;
                        
                    }

                    foreach ($feb as $f) {
                      
                        $tFeb += $f->total;
                        $tTotal += $f->total;
                    }

                    foreach ($mar as $j) {
                       
                        $tMar += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($apr as $j) {
                       
                        $tApr += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($may as $j) {
                       
                        $tMay += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($jun as $j) {
                      
                        $tJun += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($jul as $j) {
                       
                        $tJul += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($aug as $j) {
                      
                        $tAug += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($sep as $j) {
                       
                        $tSep += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($oct as $j) {
                       
                        $tOct += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($nov as $j) {
                       
                        $tNov += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($dec as $j) {
                        
                        $tDec += $j->total;
                        $tTotal += $j->total;
                    }
                ?>


<!-- Be sure to place the above styles (i.e. everything between the <style></style> tags) into the document 'head' (i.e. between the <head></head> tags. Everything below goes inside the <body></body> tags) -->
                <table class="myTable" style="margin-top: 30px; margin-bottom: 40px;" >
                    <tr>
                        <th style="border-top: none; border-left: none; text-align: left" width="100px">Month</th>

                        <th style="border-top: none; text-align: left; border-right: none" width="70px">{{$year}}</th>
                    </tr>
                    <tr>
                        <td style="border-left: none">JAN</td>
                        <td>{{$tJan}}</td>

                    </tr>
                    <tr>
                        <td style="border-left: none">FEB</td>

                        <td>{{$tFeb}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">MAR</td>

                        <td>{{$tMar}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">MAR</td>

                        <td>{{$tApr}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">APR</td>

                        <td>{{$tMay}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">JUN</td>

                        <td>{{$tJun}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">JUL</td>

                        <td>{{$tJul}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">AUG</td>

                        <td>{{$tAug}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">SEP</td>

                        <td>{{$tSep}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">OCT</td>

                        <td>{{$tOct}}</td>
                    </tr>
                    <tr>
                        <td style="border-left: none">NOV</td>

                        <td>{{$tNov}}</td>
                    </tr>



                    <tr>
                        <td style="border-left: none; border-bottom: 1px solid">DEC</td>

                        <td style="border-bottom: 1px solid">{{$tDec}}</td>
                    </tr>

                    <tr>
                        <td style="border-left: none; text-align: right; font-weight: bold">Total Sales:</td>

                        <td style="font-weight: bold">{{$tTotal}}</td>
                    </tr>




                </table>
            </div>


        </div>
    </body>
</html>
