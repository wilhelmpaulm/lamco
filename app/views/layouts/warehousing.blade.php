
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
    <head>
        <meta charset="utf-8">
        <title>Lamco Warehousing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->

        {{HTML::style('css/dataTables.css')}}
        {{HTML::style('css/flatstrap-bootstrap.css')}}

        <!--{{HTML::style('css/bootstrap.min.css')}}-->    
        <!--{{HTML::style('css/cosmo-bootstrap.css')}}-->
        {{HTML::style('css/bootstrap-responsive.min.css')}}
        {{HTML::style('css/font-awesome.min.css')}}
        {{HTML::style('css/wilhelmpaulm.css')}}
        {{HTML::style('css/parsley.css')}}
        {{HTML::style('css/ladda.css')}}
        {{HTML::style('css/select2.css')}}


        {{HTML::script('js/jquery.js')}}
        {{HTML::script('js/bootstrap.min.js')}}
        {{HTML::script('js/parsley.min.js')}}
        {{HTML::script('js/dataTables.min.js')}}
        {{HTML::script('js/notify.min.js')}}
        {{HTML::script('js/pulsate.min.js')}}
        <!--    {{HTML::script('js/spin.min.js')}}-->
        {{HTML::script('js/ladda.js')}}
        {{HTML::script('js/select2.min.js')}}

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
                background: url('{{URL::asset("bg/paper_3.png")}}');

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
                    <a class="brand" href="{{URL::to('warehousing/')}}">Warehousing Department</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            Logged in as {{Auth::user()->first_name}} | <a href="{{URL::to('logout')}}" class="navbar-link">Logout</a>
                        </p>
                        <ul class="nav">
                            <!--              <li class="active"><a href="#">Home</a></li>
                                          <li><a href="#about">About</a></li>
                                          <li><a href="#contact">Contact</a></li>-->
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
                            <li><a href="{{URL::to('warehousing/memos')}}">Memos</a></li>
                            <li><a href="{{URL::to('warehousing/reminders')}}">Reminders</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-money"></i> Purchasing</li>
                            <li><a href="{{URL::to('warehousing/view-purchase-orders')}}">View Purchase Orders</a></li>
                            <li><a href="{{URL::to('warehousing/view-receiving-reports')}}">View Receiving Reports</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-bookmark"></i> Inventory</li>
                            <li><a href="{{URL::to('warehousing/view-rolls')}}">View Rolls</a></li>
                            <li><a href="{{URL::to('warehousing/view-products')}}">View Products</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-suitcase"></i> Suppliers</li>
                            <li><a href="{{URL::to('warehousing/view-suppliers')}}">View Suppliers</a></li>
                            <li><a href="{{URL::to('warehousing/view-add-supplier')}}">Add Suppliers</a></li>
                            
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

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

    </body>

    <!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
</html>