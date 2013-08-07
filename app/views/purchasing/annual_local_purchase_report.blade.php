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
                    <p style="float: right; margin-top: -90px; margin-right: 5px;">Date Generated:</p> 
                    <p style="float: right; margin-top: -70px; margin-right: 5px;"><?php echo date('jS \of F Y ');?></p><br>
                    <p style="float: right; margin-top: -70px; margin-right: 5px;"><?php echo date('h:i:s A');?></p>
                </div>
            </div>

            <div>
                <h3 style="text-align: center">Annual Purchase Report</h3> 
            </div>

            <div>

                <style type="text/css">
                    table.myTable { border-collapse:collapse; table-layout: fixed; width: 935px;}
                    th { border:1px solid black; }
                    td { border-bottom: none; border-left: 1px solid black;  text-align: left; font-size: 9px; word-wrap: break-word; padding: 5px;}

                    .amount {text-align: right}
                </style>
                <!-- Be sure to place the above styles (i.e. everything between the <style></style> tags) into the document 'head' (i.e. between the <head></head> tags. Everything below goes inside the <body></body> tags) -->
                <table class="myTable" style="margin-top: 30px; margin-bottom: 40px;" >
                    <tr>
                        <th style="border-top: none; border-left: none; text-align: left" width="80px">Description</th>
                        <th style="border-top: none; text-align: right" width="70px">JAN</th>
                        <th style="border-top: none; text-align: right" width="70px">FEB</th>
                        <th style="border-top: none; text-align: right" width="70px">MAR</th>
                        <th style="border-top: none; text-align: right" width="70px">APR</th>
                        <th style="border-top: none; text-align: right" width="70px">MAY</th>
                        <th style="border-top: none; text-align: right" width="70px">JUN</th>
                        <th style="border-top: none; text-align: right" width="70px">JUL</th>
                        <th style="border-top: none; text-align: right" width="70px">AUG</th>
                        <th style="border-top: none; text-align: right" width="70px">SEP</th>
                        <th style="border-top: none; text-align: right" width="70px">OCT</th>
                        <th style="border-top: none; text-align: right" width="70px">NOV</th>
                        <th style="border-top: none; text-align: right; border-right: none" width="70px">DEC</th>
                    </tr>

                    <?php
                    
                    $rolls = DB::select("select distinct(paper_type) from po_details where year(created_at) = ? ", [$year]);
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
                            ?>
                    @foreach($rolls as $roll)

                    <?php
                    $jan = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["1", $year, $roll->paper_type]);
                    $feb = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["2", $year, $roll->paper_type]);
                    $mar = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["3", $year, $roll->paper_type]);
                    $apr = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["4", $year, $roll->paper_type]);
                    $may = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["5", $year, $roll->paper_type]);
                    $jun = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["6", $year, $roll->paper_type]);
                    $jul = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["7", $year, $roll->paper_type]);
                    $aug = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["8", $year, $roll->paper_type]);
                    $sep = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["9", $year, $roll->paper_type]);
                    $oct = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["10", $year, $roll->paper_type]);
                    $nov = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["11", $year, $roll->paper_type]);
                    $dec = DB::select("select * from po_details where month(created_at) = ? and year(created_at) = ? and paper_type = ? ", ["12", $year, $roll->paper_type]);

                    $pJan = 0.0;
                    $pFeb = 0.0;
                    $pMar = 0.0;
                    $pApr = 0.0;
                    $pMay = 0.0;
                    $pJun = 0.0;
                    $pJul = 0.0;
                    $pAug = 0.0;
                    $pSep = 0.0;
                    $pOct = 0.0;
                    $pNov = 0.0;
                    $pDec = 0.0;

                    foreach ($jan as $j) {
                        $pJan += $j->total;
                        $tJan += $j->total;
                        $tTotal += $j->total;
                        
                    }

                    foreach ($feb as $f) {
                        $pFeb += $f->total;
                        $tFeb += $f->total;
                        $tTotal += $f->total;
                    }

                    foreach ($mar as $j) {
                        $pMar += $j->total;
                        $tMar += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($apr as $j) {
                        $pApr += $j->total;
                        $tApr += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($may as $j) {
                        $pMay += $j->total;
                        $tMay += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($jun as $j) {
                        $pJun += $j->total;
                        $tJun += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($jul as $j) {
                        $pJul += $j->total;
                        $tJul += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($aug as $j) {
                        $pAug += $j->total;
                        $tAug += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($sep as $j) {
                        $pSep += $j->total;
                        $tSep += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($oct as $j) {
                        $pOct += $j->total;
                        $tOct += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($nov as $j) {
                        $pNov += $j->total;
                        $tNov += $j->total;
                        $tTotal += $j->total;
                    }

                    foreach ($dec as $j) {
                        $pDec += $j->total;
                        $tDec += $j->total;
                        $tTotal += $j->total;
                    }
                    ?>
                    <tr>
                        <td style="border-left: none">{{$roll->paper_type}}</td>
                        <td>{{$pJan}}</td>
                        <td>{{$pFeb}}</td>
                        <td>{{$pMar}}</td>
                        <td>{{$pApr}}</td>
                        <td>{{$pMay}}</td>
                        <td>{{$pJun}}</td>
                        <td>{{$pJul}}</td>
                        <td>{{$pAug}}</td>
                        <td>{{$pSep}}</td>
                        <td>{{$pOct}}</td>
                        <td>{{$pNov}}</td>
                        <td>{{$pDec}}</td>
                    </tr>
                    @endforeach


                </table>
            </div>

            <div>
                <p style="margin-top: -20px">Subtotal:</p> 
                <p style="margin-left: 80px; margin-top: -30px">{{$tJan}}</p>
                <p style="margin-left: 225px; margin-top: -30px">{{$tMar}}</p>
                <p style="margin-left: 375px; margin-top: -30px">{{$tMay}}</p>
                <p style="margin-left: 520px; margin-top: -30px">{{$tJul}}</p>
                <p style="margin-left: 665px; margin-top: -30px">{{$tSep}}</p>
                <p style="margin-left: 810px; margin-top: -30px">{{$tNov}}</p>
            </div>

            <div>
                <p style="margin-left: 150px">{{$tFeb}}</p>
                <p style="margin-left: 300px; margin-top: -30px">{{$tApr}}</p>
                <p style="margin-left: 445px; margin-top: -30px">{{$tJun}}</p>
                <p style="margin-left: 590px; margin-top: -30px">{{$tAug}}</p>
                <p style="margin-left: 735px; margin-top: -30px">{{$tOct}}</p>
                <p style="margin-left: 855px; margin-top: -30px">{{$tDec}}</p>
            </div>

            <div>
                <p style="margin-left: 640px; font-weight: bold">Total Purchase Amount:</p> 
                <p style="margin-left: 835px; margin-top: -30px; font-weight: bold">{{$tTotal}}</p>
            </div>

            <div>
                <!--<p style="margin-top: 20px; float: right"> Page 9 of 9 </p>-->
            </div>
        </div>
    </body>
</html>
