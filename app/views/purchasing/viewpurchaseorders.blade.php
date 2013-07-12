@extends('layouts.purchasing')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <ul class="breadcrumb balon">
                <li>
                    <a href="#">Home</a> <span class="divider">/</span>
                </li>
                <li>
                    <a href="#">Purchasing</a> <span class="divider">/</span>
                </li>
                
                <li class="active">
                View Purchase Orders
                </li>
            </ul>
            <div class="tabbable" id="tabs-299920">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#po-pending" data-toggle="tab">Pending Purchase Orders</a>
                    </li>
                    <li>
                        <a href="#po-approved" data-toggle="tab">Approved Purchase Orders</a>
                    </li>
                    <li>
                        <a href="#po-accomplished" data-toggle="tab">Accomplished Purchase Orders</a>
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
                                            <th>
                                            </th>
                                            <th>
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($pos_p as $pos)
                                        <tr>
                                            <td>
                                                {{$pos->id}}
                                            </td>
                                            <td>
                                                {{$pos->supplier}}
                                            </td>
                                            <td>
                                                {{$pos->created_at}}
                                            </td>
                                            <td>
                                                {{$pos->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('purchasing/view-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pos->id}}" />
                                                    <!--<input class="btn btn-info" type="submit" value="View" />-->
                                                     <button class="ladda-button btn btn-info expand-right " type="submit"><span class="ladda-label">View</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('purchasing/approve-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pos->id}}" />
                                                    <!--<input class="btn btn-success" type="submit" value="Approve" />-->
                                                     <button class="ladda-button btn expand-right btn-success" type="submit"><span class="ladda-label">Approve</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('purchasing/edit-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pos->id}}" />
                                                    <!--<input class="btn btn-warning" type="submit" value="Edit" />-->
                                                     <button class="ladda-button btn  expand-right btn-warning" type="submit"><span class="ladda-label">Edit</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('purchasing/delete-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pos->id}}" />
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
                    <div class="tab-pane" id="po-approved">
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

                                        @foreach($pos_a as $pos)
                                        <tr>
                                            <td>
                                                {{$pos->id}}
                                            </td>
                                            <td>
                                                {{$pos->supplier}}
                                            </td>
                                            <td>
                                                {{$pos->created_at}}
                                            </td>
                                            <td>
                                                {{$pos->updated_at}}
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('purchasing/view-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pos->id}}" />
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
                    <div class="tab-pane" id="po-accomplished">
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

                                        @foreach($pos_f as $pos)
                                        <tr>
                                            <td>
                                                {{$pos->id}}
                                            </td>
                                            <td>
                                                {{$pos->supplier}}
                                            </td>
                                            <td>
                                                {{$pos->created_at}}
                                            </td>
                                            <td>
                                                {{$pos->updated_at}}
                                            </td>
                                           <td>
                                                 <form action="{{URL::to('purchasing/view-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pos->id}}" />
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