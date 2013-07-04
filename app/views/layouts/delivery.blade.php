
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
<head>
    <meta charset="utf-8">
    <title>Lamco Delivery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/flatty-bootstrap.css')}}
    {{HTML::style('css/bootstrap-responsive.min.css')}}
    {{HTML::style('css/font-awesome.min.css')}}
    {{HTML::style('css/wilhelmpaulm.css')}}
    {{HTML::style('css/parsley.css')}}
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        background: url('{{URL::asset("bg/black-Linen.png")}}')
      }
      .hero-unit {
        /*background: url('{{URL::asset("bg/paper_3.png")}}')*/
                background: url('{{URL::asset("bg/project_paper.png")}}')

      }
      .well{
          background: url('{{URL::asset("bg/project_papper.png")}}')
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
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

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

    <div class="navbar  navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Delivery Department</a>
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
        
          <div class="span3 ">
          <div class="well sidebar-nav ">
            <ul class="nav nav-list">
                <li class="nav-header"><i class="icon-home"></i> Home</li>
              <li><a href="{{URL::to('purchasing/memo')}}">Memos</a></li>
              <li><a href="{{URL::to('purchasing/reminder')}}">Reminders</a></li>
              <li><hr></li>
              <li class="nav-header"><i class="icon-truck"></i> Delivery</li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Delivery Queue</a></li>
              <li><a href="{{URL::to('purchasing/purchase-order-summary')}}">Create Delivery Queue</a></li>
              <li><a href="{{URL::to('purchasing/purchase-order-summary')}}">Reschedule Delivery Queue</a></li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Create Bad Order Report</a></li>
              <li><hr></li>
              <li class="nav-header"><i class="icon-bookmark"></i> Inventory</li>
              <li><a href="#">View Rolls</a></li>
              <li><a href="#">Rolls Summary</a></li>
              <li><a href="#">View Products</a></li>
              <li><a href="#">Products Summary</a></li>
              <li><hr></li>
              <li class="nav-header"><i class="icon-suitcase"></i> Clients</li>
              <li><a href="#">View Clients</a></li>
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
    {{HTML::script('js/jquery.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/parsley.min.js')}}
  </body>

<!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
</html>