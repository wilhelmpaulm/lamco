@extends('layouts.production')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <ul class="breadcrumb balon">
                <li>
                    <a href="#">Home</a> <span class="divider">/</span>
                </li>
                <li>
                    <a href="#">Production</a> <span class="divider">/</span>
                </li>
                <li class="active">
                Job Orders
                </li>
            </ul>
            <div class="tabbable" id="tabs-299920">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#po-pending" data-toggle="tab">Pending Job Orders</a>
                    </li>
                    <li>
                        <a href="#po-inproduction" data-toggle="tab">Job Orders in production</a>
                    </li>
                    <li>
                        <a href="#po-completed" data-toggle="tab">Rejected Job Orders</a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="po-pending">
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                                    <thead>
                                        <tr>
                                            <th aria-controls="example">
                                                #
                                            </th>
                                            
                                            <th>
                                                Date Created
                                            </th>
                                            <th>
                                                Date Updated
                                            </th>
<!--                                            <th>
                                            </th>
                                            <th>
                                            </th>-->
                                            <th>
                                            </th>
                                            <th>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($mq_p as $mq)
                                        <tr>
                                            <td>
                                                {{$mq->id}}
                                            </td>
                                            
                                            <td>
                                                {{$mq->created_at}}
                                            </td>
                                            <td>
                                                {{$mq->updated_at}}
                                            </td>
<!--                                            <td>
                                                <form action="{{URL::to('production/view-job-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$mq->id}}" />
                                                    <input class="btn btn-info" type="submit" value="View" />
                                                     <button class="ladda-button btn btn-info expand-right " type="submit"><span class="ladda-label">View</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('production/approve-job-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$mq->id}}" />
                                                    <input class="btn btn-success" type="submit" value="Approve" />
                                                     <button class="ladda-button btn expand-right btn-success" type="submit"><span class="ladda-label">Approve</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            
                                            </td>-->
                                            <td>
                                                 <form action="{{URL::to('production/edit-job-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$mq->id}}" />
                                                    <!--<input class="btn btn-warning" type="submit" value="Edit" />-->
                                                     <button class="ladda-button btn  expand-right btn-warning" type="submit"><span class="ladda-label">Assign Machine & Roll/s</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('production/delete-job-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$mq->id}}" />
                                                     <button class="ladda-button btn  expand-right btn-danger" type="submit"><span class="ladda-label">Delete</span><span class="ladda-spinner"></span></button>

                                                    <!--<input class="btn btn-danger" type="submit" value="Delete" />-->
                                                </form>
                                            
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="po-completed">
                        <div class="row-fluid">
                            <div class="span12">
                        <table class="table table-condensed table-bordered table-striped table-hover dtable" >

                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Vendor
                                            </th>
                                            <th>
                                                Date Created
                                            </th>
                                            <th>
                                                Date Updated
                                            </th>
                                            
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($mq_a as $mq)
                                        <tr>
                                            <td>
                                                {{$mq->id}}
                                            </td>
                                            <td>
                                                {{$mq->supplier}}
                                            </td>
                                            <td>
                                                {{$mq->created_at}}
                                            </td>
                                            <td>
                                                {{$mq->updated_at}}
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('production/view-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$mq->id}}" />
                                                                                                         <button class="ladda-button btn btn-info expand-right " type="submit"><span class="ladda-label">View</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="po-inproduction">
                        <div class="row-fluid">
                            <div class="span12">
                                                               <table class="table table-condensed table-bordered table-striped table-hover dtable" >

                                    <thead>
                                        <tr>
                                            <th>
                                                JO #
                                            </th>
                                            <th>
                                                Client
                                            </th>
                                            <th>
                                                Machine
                                            </th>
                                            <th>
                                                Production Type
                                            </th>
                                            <th>
                                                Date Created
                                            </th>
                                            <th>
                                                Date Updated
                                            </th>
                                            
                                           
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($mq_i as $mq)
                                        <tr>
                                            <td>
                                                {{$mq->id}}
                                            </td>
                                            <td>
                                                {{Client::find(Sales_order::find($mq->so_no)->client)->name}}
                                            </td>
                                            <td>
                                                {{Machine::find($mq->machine)->name}}
                                            </td>
                                            <td>
                                                {{$mq->production_type}}
                                            </td>
                                            <td>
                                                {{$mq->created_at}}
                                            </td>
                                            <td>
                                                {{$mq->updated_at}}
                                            </td>
                                             <td>
                                                <form action="{{URL::to('production/view-approve-job-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$mq->id}}" />
                                                    <!--<input class="btn btn-success" type="submit" value="Approve" />-->
                                                     <button class="ladda-button btn expand-right btn-success" type="submit"><span class="ladda-label">View / Mark as Completed</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<script >
   
     
//    var l = Ladda.create(document.querySelector('.ladda-button'));
//    $('.ladda-button').click(function(){
//       Ladda.create($(this)[0]).start();
//       
//    });  
        
        
    $('form').submit(function() {
//        $.notify('Applying the changes please wait...', 'info');
        Ladda.create($(this).children('button')[0]).start();
//        l.start();
    });
//    $('#example').dataTable();
$(document).ready(function() {
    $('.dtable').dataTable();
} );
</script>


@stop