
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
    <head>
        <meta charset="utf-8">
        <title>Lamco Sales</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="wilhelmpaulm">

        <!-- Le styles -->

        {{HTML::style('css/dataTables.css')}}
        {{HTML::style('css/flatstrap-bootstrap.css')}}

        <!--{{HTML::style('css/bootstrapx.css')}}-->    
        <!--{{HTML::style('css/cosmo-bootstrap.css')}}-->
        <!--{{HTML::style('css/bootstrap-responsive.min.css')}}-->
        {{HTML::style('css/font-awesome.min.css')}}
        {{HTML::style('css/wilhelmpaulm.css')}}
        <!--{{HTML::style('css/parsley.css')}}-->
        {{HTML::style('css/ladda.css')}}
        <!--{{HTML::style('css/select2.css')}}-->


        {{HTML::script('js/jquery.js')}}
        {{HTML::script('js/bootstrap.min.js')}}
        <!--{{HTML::script('js/parsley.min.js')}}-->
        {{HTML::script('js/dataTables.min.js')}}
        {{HTML::script('js/notify.min.js')}}
        <!--{{HTML::script('js/pulsate.min.js')}}-->
        {{HTML::script('js/timer.js')}}
        {{HTML::script('js/underscore.js')}}
        <!--    {{HTML::script('js/spin.min.js')}}-->
        {{HTML::script('js/ladda.js')}}
        <!--{{HTML::script('js/select2.min.js')}}-->

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
                /*background: url('{{URL::asset("bg/paper_3.png")}}');*/
                /*background: url('{{URL::asset("bg/escheresque_ste.png")}}');*/
                /*background: url('{{URL::asset("bg/triangles.png")}}');*/


            }
            .hero-unit {
                /*background: url('{{URL::asset("bg/paper_3.png")}}');*/

            }

            .balon{

            }

            .well{
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href='{{URL::asset("ico/apple-touch-icon-144")}}'>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href='{{URL::asset("ico/apple-touch-icon-144")}}'>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href='{{URL::asset("ico/apple-touch-icon-144")}}'>
        <link rel="apple-touch-icon-precomposed" href='{{URL::asset("ico/apple-touch-icon-144")}}'>
        <link rel="shortcut icon"  href='{{URL::asset("ico/favicon.ico")}}'>
    </head>


    <body>

        <div class="navbar  navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="{{URL::to('sales/')}}">Sales Department</a>
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            <li class="dropdown hide" id="boxProducts">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file"></i> <span id="numProducts"></span> <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="notifProducts">
                                </ul>
                            </li>
                            <li class="dropdown hide" id="boxRolls">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-flag"></i> <span id="numRolls"></span> <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="notifRolls">
                                </ul>
                            </li>
                            <li class="dropdown hide" id="boxMemos">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bullhorn"></i> <span id="numMemos"></span> <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="notifMemos">
                                </ul>
                            </li>
                            <li class="dropdown hide" id="boxReminders">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-calendar"></i> <span id="numReminders"></span> <b class="caret"></b></a>
                                <ul class="dropdown-menu" id="notifReminders">
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> {{Auth::user()->first_name}} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{URL::to('logout')}}">Log out</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid ">
            <div class="row-fluid ">

                <div class="span2 f-osb " >
                    <div class="sidebar-nav well bg-white">
                        <ul class="nav nav-list">
                            <li class="nav-header"><i class="icon-home"></i> Home</li>
                            <li><a href="{{URL::to('sales/memos')}}" >Memos</a></li>
                            <li><a href="{{URL::to('sales/reminders')}}">Reminders</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-tags"></i> Sales</li>
                            <li><a href="{{URL::to('sales/create-sales-order')}}">Create Sales Order</a></li>
                            <li><a href="{{URL::to('sales/view-sales-orders')}}">View Sales Orders</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-file"></i> Reports</li>
                            <li><a id="modal-711257" href="#dailyReport"  data-toggle="modal">Daily Sales Report</a></li>
                            <li><a id="modal-711257" href="#monthlyReport"  data-toggle="modal">Monthly Sales Report</a></li>
                            <li><a id="modal-711257" href="#annualReport"  data-toggle="modal">Annual  Sales Report</a></li>
                            <!--<li><a href="{{URL::to('purchasing/view-annual-purchase-report')}}">Annual Purchase Report</a></li>-->
                            <!--<li><a href="{{URL::to('purchasing/view-receiving-reports')}}">View Receiving Reports</a></li>-->
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-bookmark"></i> Inventory</li>
                            <li><a href="{{URL::to('sales/view-rolls')}}">View Rolls</a></li>
                            <!--<li><a href="#">Rolls Summary</a></li>-->
                            <li><a href="{{URL::to('sales/view-products')}}">View Products</a></li>
                            <!--<li><a href="#">Products Summary</a></li>-->
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-suitcase"></i> Clients</li>
                            <li><a href="{{URL::to('sales/view-clients')}}">View Clients</a></li>
                            <li><a href="{{URL::to('sales/view-add-client')}}">Add Client</a></li>
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->

                <!--this is the margin--> 


                <div class="span10 well bg-white">

                    @yield('main')

                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; Company 2013</p>
            </footer>

        </div><!--/.fluid-container-->

        
        <div id="annualReport" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Generate Annual Sales Report</h3>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('sales/view-annual-sales-report')}}" method="post">
                    
                    <select name="year">
                        <option >2011</option>
                        <option >2012</option>
                        <option >2013</option>
                        <option >2014</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal" aria-hidden="true">Close</button> <button type="submit" class="btn btn-primary">Generate</button>
                </form>
            </div>
        </div>
        <div id="monthlyReport" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Generate Monthly Sales Report</h3>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('sales/view-monthly-sales-report')}}" method="post">
                    <select name="month">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select name="year">
                        <option >2011</option>
                        <option >2012</option>
                        <option >2013</option>
                        <option >2014</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal" aria-hidden="true">Close</button> <button type="submit" class="btn btn-primary">Generate</button>
                </form>
            </div>
        </div>
        <div id="dailyReport" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Generate Daily Sales Report</h3>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('sales/view-daily-sales-report')}}" method="post">
                    <select name="month">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select name="day">
                        <?php for ($index = 0; $index < 31; $index++) {
                            echo "<option >".($index+1)."</option>";
                        }?>
                    </select>
                    <select name="year">
                        <option >2011</option>
                        <option >2012</option>
                        <option >2013</option>
                        <option >2014</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal" aria-hidden="true">Close</button> <button type="submit" class="btn btn-primary">Generate</button>
                </form>
            </div>
        </div>
        
        


        
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script>
            $('#toggleNotif').click(function() {
                $('#notification').toggleClass('hidden');
            });


            $.timer(function() {
                var notifs, reminders, memos, rolls, products;
                var remList = "";
                var memList = "";
                var rolList = "";
                var proList = "";
                $.get("{{URL::to('sales/notif')}}", function(data) {
                    notifs = JSON.parse(data);
                    reminders = JSON.parse(notifs.reminders);
                    memos = JSON.parse(notifs.memos);
                    products = JSON.parse(notifs.products);
                    rolls = JSON.parse(notifs.rolls);
                    _.each(reminders, function(r) {
                        remList += "<li class='nav-header'> " + r.created_by + "</li><li><a href='{{URL::to('sales/reminders')}}'>" + r.reminder + "</a></li><li class='divider'></i>";
                    });

                    _.each(memos, function(r) {
                        memList += "<li class='nav-header'> " + r.created_by + "</li><li><a href='{{URL::to('sales/memos')}}'>" + r.memo + "</a></li><li class='divider'></i>";
                    });
                    _.each(rolls, function(r) {
                        rolList += "<li class='nav-header'> roll " + r.id + "</li><li ><a href='{{URL::to('sales/view-rolls')}}'>has only " + r.quantity + " left</a></li><li class='divider'></i>";
                    });
                    _.each(products, function(r) {
                        proList += "<li class='nav-header'> roll " + r.id + "</li><li ><a href='{{URL::to('sales/view-products')}}'>has only " + r.quantity + " left</a></li><li class='divider'></i>";
                    });
                    $("#notifReminders").html(remList);
                    $("#notifMemos").html(memList);
                    $("#notifRolls").html(rolList);
                    $("#notifProducts").html(proList);
                    if (_.size(reminders) < 1) {
                        $("#boxReminders").hide();
                    } else {
                        $("#numReminders").text(_.size(reminders).toString());
                        $("#boxReminders").show();
                    }
                    if (_.size(memos) < 1) {
                        $("#boxMemos").hide();
                    } else {
                        $("#numMemos").text(_.size(memos).toString());
                        $("#boxMemos").show();
                    }
                    if (_.size(rolls) < 1) {
                        $("#boxRolls").hide();
                    } else {
                        $("#numRolls").text(_.size(rolls).toString());
                        $("#boxRolls").show();
                    }
                    if (_.size(products) < 1) {
                        $("#boxProducts").hide();
                    } else {
                        $("#numProducts").text(_.size(products).toString());
                        $("#boxProducts").show();
                    }

   //                    console.log(remlist);
                });
            }, 5000, true);
        </script>
    </body>

    <!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
</html>
