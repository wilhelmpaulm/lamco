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
                        <a href="#po-approved" data-toggle="tab">Approved ({{$so_a->count()}})</a>
                    </li>
                    <li>
                        <a href="#po-accomplished" data-toggle="tab">Completed ({{$so_f->count()}})</a>
                    </li>
                    <li>
                        <a href="#po-rejected" data-toggle="tab">Rejected ({{$so_r->count()}})</a>
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
                                                <form action="{{URL::to('sales/approve-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-info" type="submit" value="Approve Order" />
                                                </form>
                                            </td>

                                            <td>
                                                <form action="{{URL::to('sales/edit-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-warning" type="submit" value="Modify Order" />
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('sales/delete-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-danger" type="submit" value="Delete " />
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
                    <div class="tab-pane" id="po-rejected">
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

                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($so_r as $so)
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
                                                    <input class="btn btn-warning" type="submit" value="View" />
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('sales/edit-sales-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$so->id}}" />
                                                    <input class="btn btn-warning" type="submit" value="Modify Order" />
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
//    $('#example').dataTable();
    $(document).ready(function() {
        $('.dtable').dataTable();
    });
</script>


@stop