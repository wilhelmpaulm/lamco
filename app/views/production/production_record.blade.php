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
                    <h3 style="float: right; margin-top: -120px">PRODUCTION</h3>
                    <h3 style="float: right; margin-top: -100px">RECORD</h3>
                    <h4 style="float: right; margin-top: -60px; margin-right: 65px;">PR NO.</h4> <p style="float: right; margin-top: -60px; font-weight: bold; font-size: 16px">{{$pr->id}}</p>
                    <p style="float: right; margin-top: -35px; margin-right: 65px;"></p> <p style="float: right; margin-top: -35px; margin-right: -2px;">{{$pr->created_at}}</p>
                    <p style="float: right; margin-top: -10px; margin-right: 95px;">PRODUCTION TYPE:</p> <p style="float: right; margin-top: -10px; margin-right: -230px;">{{$pr->production_type}}</p>
                </div>
            </div>

            <hr>

            <div>
                <h4>SO NO.</h4> <p style="margin-top: -30px; margin-left: 80px; font-size: 15px;">{{$pr->so_no}}</p>
                <h4 style="margin-top: -30px; margin-left: 600px;">OWNER:</h4> <p style="margin-top: -30px; margin-left: 690px;  font-size: 15px;">{{Client::find(Sales_order::find($pr->so_no)->client)->name}}</p>
            </div>

            @foreach($pr_d as $p_d)
            @if($p_d->transaction_type == "roll")
            <?php $r = Roll::find($p_d->roll) ?>
            <div>
                <h4>ROLL CODE:</h4> <p style="margin-top: -30px; margin-left: 130px;  font-size: 15px;">{{$r->id}}</p>
                <h4 style="margin-top: -30px; margin-left: 600px;">SHELF LOCATION:</h4> <p style="margin-top: -30px; margin-left: 780px;  font-size: 15px;">{{$r->warehouse}} - {{$r->location}}</p>
            </div>

            <div>
                <h4>ROLL DESCRIPTION:</h4> <p style="margin-top: -30px; margin-left: 200px;  font-size: 15px;">{{$p_d->quantity}} {{$r->unit}} {{$r->paper_type}} {{$r->dimension}} {{$r->weight}} {{$r->calliper}}</p>
            </div>
            @endif
            @endforeach




            <div>

                <style type="text/css">
                    table.myTable { border-collapse:collapse; table-layout: fixed; width: 935px;}
                    th { border:1px solid black; }
                    td { border:1px solid black;  text-align: left; word-wrap: break-word; padding: 5px;}
                    .amount {text-align: right;}
                </style>
                <!-- Be sure to place the above styles (i.e. everything between the <style></style> tags) into the document 'head' (i.e. between the <head></head> tags. Everything below goes inside the <body></body> tags) -->
                <table class="myTable" style="margin-top: 30px; margin-bottom: 40px;" >
                    <tr>
                        <th width="100px">WEIGHT</th>
                        <th width="100px">DIMENSION</th>
<!--                        <th width="150px">OUTPUT SIZE</th>-->
                        <th width="50px">UNIT</th>
                        <th width="80px">QUANTITY</th>
                        <th width="250px">PRODUCTION NOTES</th>
                    </tr>

                    @foreach($pr_d as $p_d)
                    @if($p_d->transaction_type == "product")



                    <tr>
                        <td >{{$p_d->weight}}</td>
                        <td >{{$p_d->dimension}}</td>
                        <td>{{$p_d->unit}}</td>
                        <td>{{$p_d->quantity}}</td>
                        <td></td>
                    </tr>
                    @endif
                    @endforeach




                </table>
            </div>



            <div>
                <h4 style="margin-left: 80px; margin-top: 40px">CHECKER A:</h4>
            </div>

            <p style=" margin-left: 50px">_____________________</p>

            <div>
                <h4 style="margin-left: 390px; margin-top: -60px">CHECKER B:</h4> 
            </div>

            <p style=" margin-left: 375px">_____________________</p>

            <div>
                <h4 style="margin-left: 720px; margin-top: -60px">APPROVED BY:</h4> 
            </div>

            <p style=" margin-left: 715px">_____________________</p>

            <div>

                <table border="1" style="margin-top: 50px">
                    <tbody>
                        <tr>
                            <td width="500px">
                                <h4>ROLL UPDATES</h4>
                                <h5 style="margin-left: 60px">NEW WEIGHT:</h5>
                                <h5 style="margin-left: 60px">NEW DIMENSION:</h5>
                            </td>
                            <td width="500px"><h4>PRODUCTION DETAILS</h4>
                                <h5 style="margin-left: 90px">MACHINE:</h5> <p style="margin-left: 180px; margin-top: -30px">{{Machine::find($pr->mq_no)->name}}</p>
                                <!--<h5 style="margin-left: 90px">OPERATOR:</h5> <p style="margin-left: 180px; margin-top: -30px">XXXXXXXXXXX</p>-->

                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            
            @if($pr->status == 'processed')
            <hr>
            <hr>
            <form id="mamamia"  class="" action="{{URL::to('production/approve-production-record')}}" method="post">
                <input type="hidden" name="id" value="{{$pr->id}}" />
                
                <input type="submit" class="btn btn-warning pull-right" value="Approve Production Record" />
            </form>
            @endif
        </div>
    </body>
</html>
