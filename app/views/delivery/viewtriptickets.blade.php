@extends('layouts.delivery')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <ul class="breadcrumb balon">
                <li>
                    <a href="#">Home</a> <span class="divider">/</span>
                </li>
                <li>
                    <a href="#">Delivery</a> <span class="divider">/</span>
                </li>

                <li class="active">
                    View Trip Tickets
                </li>
            </ul>
            <div class="tabbable" id="tabs-299920">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#dq-pending" data-toggle="tab">Pending Trip Tickets ({{$dq_p->count()}})</a>
                    </li>
                   
                    <li>
                        <a href="#dq-delivery" data-toggle="tab">Trip Tickets In Delivery ({{$dq_d->count()}})</a>
                    </li>
                    <li>
                        <a href="#dq-completed" data-toggle="tab">Completed Trip Tickets ({{$dq_c->count()}})</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="dq-pending">
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                                    <thead>
                                        <tr>
                                            <th aria-controls="example">
                                                #
                                            </th>
                                            <th>
                                                Client
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

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($dq_p as $dq)
                                        <tr>
                                            <td>
                                                {{$dq->id}}
                                            </td>
                                            <td>
                                                {{$dq->client}}
                                            </td>
                                            <td>
                                                {{$dq->created_at}}
                                            </td>
                                            <td>
                                                {{$dq->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('delivery/view-approve-trip-ticket')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$dq->id}}" />
                                                    <input class="btn btn-warning" type="submit" value="View / Approve Trip Ticket" />
                                                </form>
                                            </td>

                                            <td>
                                                <form action="{{URL::to('billing/delete-trip-ticket')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$dq->id}}" />
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
                    <div class="tab-pane" id="dq-delivery">
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

                                        @foreach($dq_d as $dq)
                                        <tr>
                                            <td>
                                                {{$dq->id}}
                                            </td>
                                            <td>
                                                {{$dq->supplier}}
                                            </td>
                                            <td>
                                                {{$dq->created_at}}
                                            </td>
                                            <td>
                                                {{$dq->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('delivery/view-approve-trip-ticket')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$dq->id}}" />
                                                    <input class="btn btn-info" type="submit" value="View / Approve Sales Invoice" />
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    
                    <div class="tab-pane" id="dq-completed">
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

                                        @foreach($dq_c as $dq)
                                        <tr>
                                            <td>
                                                {{$dq->id}}
                                            </td>
                                            <td>
                                                {{$dq->supplier}}
                                            </td>
                                            <td>
                                                {{$dq->created_at}}
                                            </td>
                                            <td>
                                                {{$dq->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('billing/view-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$dq->id}}" />
                                                    <input class="btn btn-info" type="submit" value="View / Approve Sales Invoice" />
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
    });
</script>


@stop