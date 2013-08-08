@extends('layouts.billing')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
       
            <div class="tabbable" id="tabs-299920">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="#si-hold" data-toggle="tab">On Hold ({{$si_h->count()}})</a>
                    </li>
                    <li class="active">
                        <a href="#si-pending" data-toggle="tab">Pending ({{$si_p->count()}})</a>
                    </li>
                    <li>
                        <a href="#si-approved" data-toggle="tab">Approved ({{$si_a->count()}})</a>
                    </li>
                    <li>
                        <a href="#si-delivery" data-toggle="tab">In Delivery ({{$si_d->count()}})</a>
                    </li>
                    <li>
                        <a href="#si-completed" data-toggle="tab">Completed ({{$si_c->count()}})</a>
                    </li>
                    <li>
                        <a href="#si-rejected" data-toggle="tab">Rejected ({{$si_r->count()}})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="si-pending">
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Vendor</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                            <th ></th>
                                            <th ></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($si_p as $si)
                                        <tr>
                                            <td>
                                                {{$si->id}}
                                            </td>
                                            <td>
                                                {{$si->client}}
                                            </td>
                                            <td>
                                                {{$si->created_at}}
                                            </td>
                                            <td>
                                                {{$si->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('billing/view-edit-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$si->id}}" />
                                                    <input class="btn btn-warning" type="submit" value="Modify Sales Invoice" />
                                                </form>
                                            </td>

                                            <td>
                                                <form action="{{URL::to('billing/delete-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$si->id}}" />
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
                    <div class="tab-pane" id="si-approved">
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

                                        @foreach($si_a as $si)
                                        <tr>
                                            <td>
                                                {{$si->id}}
                                            </td>
                                            <td>
                                                {{$si->supplier}}
                                            </td>
                                            <td>
                                                {{$si->created_at}}
                                            </td>
                                            <td>
                                                {{$si->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('billing/view-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$si->id}}" />
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
                    <div class="tab-pane" id="si-delivery">
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

                                        @foreach($si_d as $si)
                                        <tr>
                                            <td>
                                                {{$si->id}}
                                            </td>
                                            <td>
                                                {{$si->supplier}}
                                            </td>
                                            <td>
                                                {{$si->created_at}}
                                            </td>
                                            <td>
                                                {{$si->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('billing/view-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$si->id}}" />
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
                    <div class="tab-pane" id="si-completed">
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

                                        @foreach($si_c as $si)
                                        <tr>
                                            <td>
                                                {{$si->id}}
                                            </td>
                                            <td>
                                                {{$si->supplier}}
                                            </td>
                                            <td>
                                                {{$si->created_at}}
                                            </td>
                                            <td>
                                                {{$si->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('billing/view-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$si->id}}" />
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
                    <div class="tab-pane" id="si-rejected">
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

                                        @foreach($si_r as $si)
                                        <tr>
                                            <td>
                                                {{$si->id}}
                                            </td>
                                            <td>
                                                {{$si->supplier}}
                                            </td>
                                            <td>
                                                {{$si->created_at}}
                                            </td>
                                            <td>
                                                {{$si->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('billing/view-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$si->id}}" />
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
                    <div class="tab-pane" id="si-hold">
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

                                        @foreach($si_h as $si)
                                        <tr>
                                            <td>
                                                {{$si->id}}
                                            </td>
                                            <td>
                                                {{$si->supplier}}
                                            </td>
                                            <td>
                                                {{$si->created_at}}
                                            </td>
                                            <td>
                                                {{$si->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('billing/view-sales-invoice')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$si->id}}" />
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
    });
</script>


@stop