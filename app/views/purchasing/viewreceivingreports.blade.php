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
                        <a href="#po-pending" data-toggle="tab">Pending Receiving Reports</a>
                    </li>
                    <li>
                        <a href="#po-approved" data-toggle="tab">Approved Receiving Reports</a>
                    </li>
                    <li>
                        <a href="#po-accomplished" data-toggle="tab">Accomplished Receiving Reports</a>
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

                                        @foreach($rr_p as $rr)
                                        <tr>
                                            <td>
                                                {{$rr->id}}
                                            </td>
                                            <td>
                                                {{$rr->vendor}}
                                            </td>
                                            <td>
                                                {{$rr->created_at}}
                                            </td>
                                            <td>
                                                {{$rr->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('purchasing/view-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
                                                    <input class="btn btn-info" type="submit" value="View" />
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('purchasing/approve-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
                                                    <input class="btn btn-success" type="submit" value="Approve" />
                                                </form>
                                            
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('purchasing/edit-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
                                                    <input class="btn btn-warning" type="submit" value="Edit" />
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('purchasing/delete-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
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

                                        @foreach($rr_a as $rr)
                                        <tr>
                                            <td>
                                                {{$rr->id}}
                                            </td>
                                            <td>
                                                {{$rr->vendor}}
                                            </td>
                                            <td>
                                                {{$rr->created_at}}
                                            </td>
                                            <td>
                                                {{$rr->updated_at}}
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('purchasing/view-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
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

                                        @foreach($rr_f as $rr)
                                        <tr>
                                            <td>
                                                {{$rr->id}}
                                            </td>
                                            <td>
                                                {{$rr->vendor}}
                                            </td>
                                            <td>
                                                {{$rr->created_at}}
                                            </td>
                                            <td>
                                                {{$rr->updated_at}}
                                            </td>
                                           <td>
                                                 <form action="{{URL::to('purchasing/view-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
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
    <div class="modal-footer">
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