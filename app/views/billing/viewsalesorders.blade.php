@extends('layouts.sales')
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
                        <a href="#po-pending" data-toggle="tab">Pending Sales Orders ({{$so_p->count()}})</a>
                    </li>
                    <li>
                        <a href="#po-approved" data-toggle="tab">Approved Sales Orders</a>
                    </li>
                    <li>
                        <a href="#po-accomplished" data-toggle="tab">Accomplished Sales Orders</a>
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

                                        @foreach($so_p as $so)
                                        <tr>
                                            <td>
                                                {{$so->id}}
                                            </td>
                                            <td>
                                                {{$so->client}}
                                            </td>
                                            <td>
                                                {{$so->created_at}}
                                            </td>
                                            <td>
                                                {{$so->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('sales/view-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-info" type="submit" value="View" />
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('sales/approve-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-success" type="submit" value="Approve" />
                                                </form>
                                            
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('sales/edit-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-warning" type="submit" value="Edit" />
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('sales/delete-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-danger" type="submit" value="Delete" />
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

                                        @foreach($so_a as $so)
                                        <tr>
                                            <td>
                                                {{$so->id}}
                                            </td>
                                            <td>
                                                {{$so->supplier}}
                                            </td>
                                            <td>
                                                {{$so->created_at}}
                                            </td>
                                            <td>
                                                {{$so->updated_at}}
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('sales/view-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-info" type="submit" value="View" />
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

                                        @foreach($so_f as $so)
                                        <tr>
                                            <td>
                                                {{$so->id}}
                                            </td>
                                            <td>
                                                {{$so->supplier}}
                                            </td>
                                            <td>
                                                {{$so->created_at}}
                                            </td>
                                            <td>
                                                {{$so->updated_at}}
                                            </td>
                                           <td>
                                                 <form action="{{URL::to('sales/view-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-info" type="submit" value="View" />
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



<div id="modal-container-771123" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">
            Modal header
        </h3>
    </div>
    <div class="modal-body">
        <p>
            One fine body…
        </p>
    </div>
    <div class="modal-footer" style="">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> <button class="btn btn-primary">Save changes</button>
    </div>
</div>


<script >
//    $('#example').dataTable();
$(document).ready(function() {
    $('.dtable').dataTable();
} );
</script>


@stop