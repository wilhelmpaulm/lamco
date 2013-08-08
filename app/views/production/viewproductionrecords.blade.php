@extends('layouts.production')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
           
            <div class="tabbable" id="tabs-299920">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#po-pending" data-toggle="tab">Pending Production Records ({{$pr_p->count()}})</a>
                    </li>
                    <li>
                        <a href="#po-inproduction" data-toggle="tab">Processed Production Records ({{$pr_i->count()}})</a>
                    </li>
                    <li>
                        <a href="#po-completed" data-toggle="tab">Completed Production Records ({{$pr_a->count()}})</a>
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

                                        @foreach($pr_p as $pr)
                                        <tr>
                                            <td>
                                                {{$pr->id}}
                                            </td>
                                            
                                            <td>
                                                {{$pr->created_at}}
                                            </td>
                                            <td>
                                                {{$pr->updated_at}}
                                            </td>

                                            <td>
                                                 <form action="{{URL::to('production/edit-production-record')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pr->id}}" />
                                                    <!--<input class="btn btn-warning" type="submit" value="Edit" />-->
                                                     <button class="ladda-button btn  expand-right btn-warning" type="submit"><span class="ladda-label">Assign to Warehouse & Location/ Input Balance Rolls</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('production/delete-production-record')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pr->id}}" />
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

                                        @foreach($pr_a as $pr)
                                        <tr>
                                            <td>
                                                {{$pr->id}}
                                            </td>
                                            <td>
                                                {{$pr->supplier}}
                                            </td>
                                            <td>
                                                {{$pr->created_at}}
                                            </td>
                                            <td>
                                                {{$pr->updated_at}}
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('production/view-production-record')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pr->id}}" />
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

                                        @foreach($pr_i as $pr)
                                        <tr>
                                            <td>
                                                {{$pr->id}}
                                            </td>
                                            <td>
                                                {{Client::find(Sales_order::find($pr->so_no)->client)->name}}
                                            </td>
                                            <td>
                                                {{Machine::find(Machine_queue::find($pr->mq_no)->machine)->name}}
                                            </td>
                                            <td>
                                                {{$pr->production_type}}
                                            </td>
                                            <td>
                                                {{$pr->created_at}}
                                            </td>
                                            <td>
                                                {{$pr->updated_at}}
                                            </td>
                                             <td>
                                                <form action="{{URL::to('production/view-approve-production-record')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pr->id}}" />
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