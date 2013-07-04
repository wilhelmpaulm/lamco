
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
    {{HTML::style('css/bootstrap.min.css')}}    
    {{HTML::style('css/flatty-bootstrap.css')}}
    {{HTML::style('css/bootstrap-responsive.min.css')}}
    {{HTML::style('css/font-awesome.min.css')}}
    {{HTML::style('css/wilhelmpaulm.css')}}
    {{HTML::style('css/parsley.css')}}
    
    {{HTML::script('js/jquery.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/parsley.min.js')}}
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        background: url('{{URL::asset("bg/diagmonds.png")}}')
      }
      .hero-unit {
               background: url('{{URL::asset("bg/project_paper.png")}}')

          /*background: url('{{URL::asset("bg/paper_3.png")}}')*/
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

    <div class="navbar navbar-inverse navbar-fixed-top">
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
              <li class="nav-header"><i class="icon-money"></i> Purchasing</li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Create Purchase Order</a></li>
              <li><a href="{{URL::to('purchasing/purchase-order-summary')}}">View Purchase Order Summary</a></li>
              <li><a href="{{URL::to('purchasing/approve-purchase-order')}}">Approve Purchase Order</a></li>
              <li><hr></li>
              <li class="nav-header"><i class="icon-bookmark"></i> Inventory</li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Rolls Summary</a></li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Manage Rolls</a></li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Products Summary</a></li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">Manage Products</a></li>
              <li><hr></li>
              <li class="nav-header"><i class="icon-suitcase"></i> Vendors</li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">View Vendors</a></li>
              <li><a href="{{URL::to('purchasing/create-purchase-order')}}">View Roll Prices</a></li>
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
  
  </body>

<!-- Mirrored from twitter.github.io/bootstrap/examples/fluid.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 23 May 2013 18:29:58 GMT -->
</html>