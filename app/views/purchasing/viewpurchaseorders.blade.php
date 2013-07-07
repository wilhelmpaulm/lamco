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
                    <a href="#">Library</a> <span class="divider">/</span>
                </li>
                <li class="active">
                    Data
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
                                <table class="table table-bordered">
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($pos_p as $pos)
                                        <tr>
                                            <td>
                                                {{$pos->id}}
                                            </td>
                                            <td>
                                                {{$pos->vendor}}
                                            </td>
                                            <td>
                                                {{$pos->created_at}}
                                            </td>
                                            <td>
                                                {{$pos->updated_at}}
                                            </td>
                                            <td>
                                                <input class="btn btn-success" type="button" value="Approve" />
                                            </td>
                                            <td>
                                                <input class="btn btn-warning" type="button" value="Edit" />
                                            </td>
                                            <td>
                                                <form action="{{URL::to('purchasing/delete-purchase-order')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$pos->id}}" />
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
                                <table class="table table-bordered">
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($pos_a as $pos)
                                        <tr>
                                            <td>
                                                {{$pos->id}}
                                            </td>
                                            <td>
                                                {{$pos->vendor}}
                                            </td>
                                            <td>
                                                {{$pos->created_at}}
                                            </td>
                                            <td>
                                                {{$pos->updated_at}}
                                            </td>
                                            <td>
                                                <input class="btn btn-success" type="button" value="Approve" />
                                            </td>
                                            <td>
                                                <input class="btn btn-warning" type="button" value="Edit" />
                                            </td>
                                            <td>
                                                <input class="btn btn-danger" type="button" value="Delete" />
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="po-finished">
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-bordered">
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($pos_f as $pos)
                                        <tr>
                                            <td>
                                                {{$pos->id}}
                                            </td>
                                            <td>
                                                {{$pos->vendor}}
                                            </td>
                                            <td>
                                                {{$pos->created_at}}
                                            </td>
                                            <td>
                                                {{$pos->updated_at}}
                                            </td>
                                            <td>
                                                <input class="btn btn-success" type="button" value="Approve" />
                                            </td>
                                            <td>
                                                <input class="btn btn-warning" type="button" value="Edit" />
                                            </td>
                                            <td>
                                                <input class="btn btn-danger" type="button" value="Delete" />
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


@stop