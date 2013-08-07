
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
    <head>
        <meta charset="utf-8">
        <title>Lamco Purchasing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->

        {{HTML::style('css/dataTables.css')}}
        <!--{{HTML::style('css/flatstrap-bootstrap.css')}}-->

        {{HTML::style('css/bootstrapx.css')}}    
        <!--{{HTML::style('css/cosmo-bootstrap.css')}}-->
        <!--{{HTML::style('css/bootstrap-responsive.min.css')}}-->
        {{HTML::style('css/font-awesome.min.css')}}
        {{HTML::style('css/wilhelmpaulm.css')}}
        {{HTML::style('css/parsley.css')}}
        {{HTML::style('css/ladda.css')}}
        <!--{{HTML::style('css/select2.css')}}-->


        {{HTML::script('js/jquery.js')}}
        {{HTML::script('js/bootstrap.min.js')}}
        {{HTML::script('js/parsley.min.js')}}
        {{HTML::script('js/dataTables.min.js')}}
        {{HTML::script('js/notify.min.js')}}
        {{HTML::script('js/pulsate.min.js')}}
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
                background: url('{{URL::asset("bg/triangles.png")}}');

            }
            .hero-unit {

                /*background: url('{{URL::asset("bg/paper_3.png")}}')*/
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

    <body style="">
        <div class="navbar  navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="{{URL::to('purchasing/')}}">Purchasing Department</a>
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
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

        <div class="container-fluid">
            <div class="row-fluid">

                <div class="span2 ">
                    <div class="well sidebar-nav ">
                        <ul class="nav nav-list">
                            <li class="nav-header"><i class="icon-home"></i> Home</li>
                            <li><a href="{{URL::to('purchasing/memos')}}">Memos</a></li>
                            <li><a href="{{URL::to('purchasing/reminders')}}">Reminders</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-money"></i> Purchasing</li>
                            <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Create Purchase Order</a></li>
                            <li><a href="{{URL::to('purchasing/view-purchase-orders')}}">View Purchase Orders</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-file"></i> Reports</li>
                            <li><a id="" href="#monthlyReport"  data-toggle="modal">Monthly Purchase Report</a></li>
                            <li><a id="" href="#annualReport"  data-toggle="modal">Annual Purchase Report</a></li>
                            <!--<li><a href="{{URL::to('purchasing/view-annual-purchase-report')}}">Annual Purchase Report</a></li>-->
                            <!--<li><a href="{{URL::to('purchasing/view-receiving-reports')}}">View Receiving Reports</a></li>-->
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-bookmark"></i> Inventory</li>
                            <li><a href="{{URL::to('purchasing/view-rolls')}}">View Rolls</a></li>
                            <li><a href="{{URL::to('purchasing/view-products')}}">View Products</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-suitcase"></i> Suppliers</li>
                            <li><a href="{{URL::to('purchasing/view-suppliers')}}">View Suppliers</a></li>
                            <li><a href="{{URL::to('purchasing/view-add-supplier')}}">Add Suppliers</a></li>
                            <!--<li><a href="{{URL::to('purchasing/view-roll-prices')}}">View Roll Prices</a></li>-->
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->

                <!--this is the margin--> 


                <div class="span10 well">

                    @yield('main')

                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; Company 2013</p>
            </footer>

        </div><!--/.fluid-container-->

        <div class="hidden">
            <ul>
                <li></li>
            </ul>


        </div>


        <div id="annualReport" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Generate Annual Purchasing Report</h3>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('purchasing/view-annual-purchase-report')}}" method="post">
                    
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
                <h3 id="myModalLabel">Generate Annual Purchasing Report</h3>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('purchasing/view-monthly-purchase-report')}}" method="post">
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
        
        



        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script>
            $('#toggleNotif').click(function() {
                $('#notification').toggleClass('hidden');
            });


            $.timer(function() {
                var notifs, reminders, memos, rolls;
                var remList = "";
                var memList = "";
                var rolList = "";
                $.get("{{URL::to('purchasing/notif')}}", function(data) {
                    notifs = JSON.parse(data);
                    reminders = JSON.parse(notifs.reminders);
                    memos = JSON.parse(notifs.memos);
                    rolls = JSON.parse(notifs.rolls);
                    _.each(reminders, function(r) {
                        remList += "<li class='nav-header'> " + r.created_by + "</li><li><a href='{{URL::to('purchasing/reminders')}}'>" + r.reminder + "</a></li><li class='divider'></i>";
                    });
                    _.each(memos, function(r) {
                        memList += "<li class='nav-header'> " + r.created_by + "</li><li><a href='{{URL::to('purchasing/memos')}}'>" + r.memo + "</a></li><li class='divider'></i>";
                    });
                    _.each(rolls, function(r) {
                        rolList += "<li class='nav-header'> roll " + r.id + "</li><li ><a href='{{URL::to('purchasing/view-rolls')}}'>has only " + r.quantity + " left</a></li><li class='divider'></i>";
                    });
                    $("#notifReminders").html(remList);
                    $("#notifMemos").html(memList);
                    $("#notifRolls").html(rolList);
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

    //                    console.log(remlist);
                });
            }, 5000, true);
        </script>
    </body>
</html>
