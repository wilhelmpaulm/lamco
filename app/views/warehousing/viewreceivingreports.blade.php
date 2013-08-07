@extends('layouts.warehousing')
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($rr_p as $rr)
                                        <tr>
                                            <td>
                                                {{$rr->id}}
                                            </td>
                                            <td>
                                                {{$rr->supplier}}
                                            </td>
                                            <td>
                                                {{$rr->created_at}}
                                            </td>
                                            <td>
                                                {{$rr->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('warehousing/view-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
                                                    <button class="ladda-button btn btn-info expand-right " type="submit"><span class="ladda-label">View</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                            <td>
                                                 <form action="{{URL::to('warehousing/edit-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
                                                                                                    <button class="ladda-button btn btn-warning expand-right " type="submit"><span class="ladda-label">Edit</span><span class="ladda-spinner"></span></button>

                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{URL::to('warehousing/delete-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
                                                    <!--<input class="btn btn-danger" type="submit" value="Delete" />-->
                                                                                                <button class="ladda-button btn btn-danger expand-right " type="submit"><span class="ladda-label">Delete</span><span class="ladda-spinner"></span></button>

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
                                                {{$rr->supplier}}
                                            </td>
                                            <td>
                                                {{$rr->created_at}}
                                            </td>
                                            <td>
                                                {{$rr->updated_at}}
                                            </td>
                                            <td>
                                                <form action="{{URL::to('warehousing/view-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
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

                                        @foreach($rr_f as $rr)
                                        <tr>
                                            <td>
                                                {{$rr->id}}
                                            </td>
                                            <td>
                                                {{$rr->supplier}}
                                            </td>
                                            <td>
                                                {{$rr->created_at}}
                                            </td>
                                            <td>
                                                {{$rr->updated_at}}
                                            </td>
                                           <td>
                                                <form action="{{URL::to('warehousing/view-receiving-report')}}" method="POST">
                                                    <input class="" type="hidden" name="id" value="{{$rr->id}}" />
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
    $('form').submit(function() {
//        $.notify('Applying the changes please wait...', 'info');
        Ladda.create($(this).children('button')[0]).start();
//        l.start();
    });
//    $('#example').dataTable();
    $(document).ready(function() {
        $('.dtable').dataTable();
    });
</script>


@stop