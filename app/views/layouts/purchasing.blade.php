
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
        {{HTML::style('css/bootstrap.min.css')}}    
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
        {{HTML::script('js/timer.js')}}
        <!--    {{HTML::script('js/spin.min.js')}}-->
        {{HTML::script('js/ladda.js')}}
        {{HTML::script('js/select2.min.js')}}


        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;

            }
            .hero-unit {
                background: url('{{URL::asset("bg/paper_3.png")}}');

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
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Purchasing Department</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">

                            Logged in as {{Auth::user()->first_name}} | <a href="{{URL::to('logout')}}" class="navbar-link">Logout</a>
                        </p>
                        <p class="navbar-text">
                            @if(Roll::where('quantity','<','50')->count() != 0)
                            <a href="{{URL::to('purchasing/view-rolls')}}"  style="color: white ; text-decoration: none"><p class="btn btn-danger notif" ><i class="icon-flag"></i><span id="num">  {{Roll::where('quantity','<','50')->count();}}</span></p></a>
                            @endif
                            <!--                            @if(Roll::where('quantity','<=','100')->count() != 0)
                                                        <a href="{{URL::to('purchasing/view-rolls')}}"  style="color: white ; text-decoration: none"><p class="btn btn-warning " ><i class="icon-flag"></i>  {{Roll::where('quantity','<=','100')->count();}}</p></a>
                                                        @endif-->
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

                <div class="span3 ">
                    <div class=" sidebar-nav ">
                        <ul class="nav nav-list">
                            <li class="nav-header"><i class="icon-home"></i> Home</li>
                            <li><a href="{{URL::to('purchasing/memo')}}">Memos</a></li>
                            <li><a href="{{URL::to('purchasing/reminder')}}">Reminders</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-money"></i> Purchasing</li>
                            <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Create Purchase Order</a></li>
                            <li><a href="{{URL::to('purchasing/view-purchase-orders')}}">View Purchase Orders</a></li>
                            <li><a href="{{URL::to('purchasing/view-receiving-reports')}}">View Receiving Reports</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-bookmark"></i> Inventory</li>
                            <li><a href="{{URL::to('purchasing/view-rolls')}}">View Rolls</a></li>
                            <li><a href="{{URL::to('purchasing/view-products')}}">View Products</a></li>
                            <li><hr></li>
                            <li class="nav-header"><i class="icon-suitcase"></i> Vendors</li>
                            <li><a href="{{URL::to('purchasing/view-vendors')}}">View Vendors</a></li>
                            <li><a href="{{URL::to('purchasing/manage-vendors')}}">Manage Vendors</a></li>
                            <li><a href="{{URL::to('purchasing/view-roll-prices')}}">View Roll Prices</a></li>
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->

                <!--this is the margin--> 


                <div class="span9 well">

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
        <script>
            var war = 5;
//            $('.notif').pulsate();
            $('.notif').pulsate({
//                color: '#000', // set the color of the pulse
                reach: 20, // how far the pulse goes in px
                speed: 1000, // how long one pulse takes in ms
                pause: 0, // how long the pause between pulses is in ms
                glow: true, // if the glow should be shown too
                repeat: true, // will repeat forever if true, if given a number will repeat for that many times
                onHover: false                          // if true only pulsate if user hovers over the element
            });

//            alert();
            var num = "";
            $.timer(function() {
                $.get("{{URL::to('purchasing/notif')}}", function(data) {
//                                          alert(data);
//                      num =  ""+data;
//                    num = data;
                        console.log( " "+data);
                        $('#num').text(" "+data);
////                    alert(data);
                });
//                alert(num);
//                    $('#num').text(num);
                
            }, 2000, true);
//          


        </script>



    </body>

    <!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
</html>
