
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
        <!--{{HTML::style('css/bootstrap-responsive.min.css')}}-->
        {{HTML::style('css/flatstrap-bootstrap.css')}}
        <!--{{HTML::style('css/bootstrap.min.css')}}-->    
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
        <!--{{HTML::script('js/select2.min.js')}}-->
   
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
          /*background: url('{{URL::asset("bg/paper_3.png")}}');*/
          /*background: url('{{URL::asset("bg/escheresque_ste.png")}}');*/background: url('{{URL::asset("bg/triangles.png")}}');
          
        
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
                    <a class="brand" href="{{URL::to('purchasing/')}}">Warehousing Department</a>
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

    <div class="container-fluid">
      <div class="row-fluid">
        
          <div class="span2 ">
          <div class="well sidebar-nav ">
            <ul class="nav nav-list">
                <li class="nav-header"><i class="icon-home"></i> Home</li>
              <li><a href="{{URL::to('sales/memos')}}">Memos</a></li>
              <li><a href="{{URL::to('sales/reminders')}}">Reminders</a></li>
              <li><hr></li>
              <li class="nav-header"><i class="icon-tags"></i> Sales</li>
              <li><a href="{{URL::to('sales/create-sales-order')}}">Create Sales Order</a></li>
              <li><a href="{{URL::to('sales/view-sales-orders')}}">View Sales Orders</a></li>
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
     <script>
            $('#toggleNotif').click(function() {
                $('#notification').toggleClass('hidden');
            });
            

            $.timer(function() {
                var notifs, reminders, memos, rolls, products;
                var remList ="";var memList ="";var rolList="";var proList="";
                $.get("{{URL::to('sales/notif')}}", function(data) {
                    notifs = JSON.parse(data);
                    reminders = JSON.parse(notifs.reminders);
                    memos = JSON.parse(notifs.memos);
                    products = JSON.parse(notifs.products);
                    rolls = JSON.parse(notifs.rolls);
                    _.each(reminders, function(r){
                        remList += "<li class='nav-header'> "+r.created_by+"</li><li><a href='{{URL::to('sales/reminders')}}'>"+r.reminder+"</a></li><li class='divider'></i>";
                    });
                   
                    _.each(memos, function(r){
                        memList += "<li class='nav-header'> "+r.created_by+"</li><li><a href='{{URL::to('sales/memos')}}'>"+r.memo+"</a></li><li class='divider'></i>";
                    });
                    _.each(rolls, function(r){
                        rolList += "<li class='nav-header'> roll "+r.id+"</li><li ><a href='{{URL::to('sales/view-rolls')}}'>has only "+r.quantity+" left</a></li><li class='divider'></i>";
                    });
                    _.each(products, function(r){
                        proList += "<li class='nav-header'> roll "+r.id+"</li><li ><a href='{{URL::to('sales/view-products')}}'>has only "+r.quantity+" left</a></li><li class='divider'></i>";
                    });
                    $("#notifReminders").html(remList);
                    $("#notifMemos").html(memList);
                    $("#notifRolls").html(rolList);
                    $("#notifProducts").html(rolList);
                    if(_.size(reminders) <1){
                        $("#boxReminders").hide();
                    }else{
                        $("#numReminders").text(_.size(reminders).toString());
                        $("#boxReminders").show();
                    }
                    if(_.size(memos) <1){
                        $("#boxMemos").hide();
                    }else{
                        $("#numMemos").text(_.size(memos).toString());
                        $("#boxMemos").show();
                    }
                    if(_.size(rolls) <1){
                        $("#boxRolls").hide();
                    }else{
                        $("#numRolls").text(_.size(rolls).toString());
                        $("#boxRolls").show();
                    }
                    if(_.size(products) <1){
                        $("#boxProducts").hide();
                    }else{
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
