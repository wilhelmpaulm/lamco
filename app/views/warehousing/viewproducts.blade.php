@extends('layouts.warehousing')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
          
            <div class="tabbable" id="tabs-299920">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#rolls-inventory" data-toggle="tab">Lamco Products ({{$lamco_products->count()}})</a>
                    </li>
                    <li>
                        <a href="#rolls-reserved" data-toggle="tab">Customer Products ({{$client_products->count()}})</a>
                    </li>
                    <li>
                        <a href="#rolls-danger" data-toggle="tab">Stock Alerter ({{$low_products->count()}})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="rolls-inventory">
                        <div class="row-fluid">
                            <div class="span12" style="">
                                <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Unit
                                            </th>
                                            <th>
                                                Paper Type
                                            </th>
                                            <th>
                                                Weight
                                            </th>
                                            <th>
                                                Dimensions
                                            </th>
                                            <th>
                                                Calliper
                                            </th>
                                            <th>
                                                Received at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                         @foreach($lamco_products as $roll)
                                         <tr @if($roll->quantity < 50) class='error' @elseif($roll->quantity < 100  ) class='warning'  @endif>
                                            <td>
                                                {{$roll->id}}
                                            </td>
                                            <td>
                                                {{$roll->quantity}}
                                            </td>
                                            <td>
                                                {{$roll->unit}}
                                            </td>
                                            <td>
                                                {{$roll->paper_type}}
                                            </td>
                                            <td>
                                                {{$roll->weight}}
                                            </td>
                                            <td>
                                                {{$roll->dimension}}
                                            </td>
                                            <td>
                                                {{$roll->calliper}}
                                            </td>
                                            <td>
                                                {{$roll->created_at}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="rolls-reserved">
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Unit
                                            </th>
                                            <th>
                                                Paper Type
                                            </th>
                                            <th>
                                                Weight
                                            </th>
                                            <th>
                                                Dimensions
                                            </th>
                                            <th>
                                                Calliper
                                            </th>
                                            <th>
                                                Received at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($client_products as $roll)
                                         <tr class="">
                                            <td>
                                                {{$roll->id}}
                                            </td>
                                            <td>
                                                {{$roll->quantity}}
                                            </td>
                                            <td>
                                                {{$roll->unit}}
                                            </td>
                                            <td>
                                                {{$roll->paper_type}}
                                            </td>
                                            <td>
                                                {{$roll->weight}}
                                            </td>
                                            <td>
                                                {{$roll->dimension}}
                                            </td>
                                            <td>
                                                {{$roll->calliper}}
                                            </td>
                                            <td>
                                                {{$roll->created_at}}
                                            </td>
                                           
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                       
                    </div>
                    <div class="tab-pane" id="rolls-danger">
                       <div class="row-fluid">
                            <div class="span12">
                                <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Unit
                                            </th>
                                            <th>
                                                Paper Type
                                            </th>
                                            <th>
                                                Weight
                                            </th>
                                            <th>
                                                Dimensions
                                            </th>
                                            <th>
                                                Calliper
                                            </th>
                                            <th>
                                                Received at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($low_products as $roll)
                                         <tr class="error">
                                            <td>
                                                {{$roll->id}}
                                            </td>
                                            <td>
                                                {{$roll->quantity}}
                                            </td>
                                            <td>
                                                {{$roll->unit}}
                                            </td>
                                            <td>
                                                {{$roll->paper_type}}
                                            </td>
                                            <td>
                                                {{$roll->weight}}
                                            </td>
                                            <td>
                                                {{$roll->dimension}}
                                            </td>
                                            <td>
                                                {{$roll->calliper}}
                                            </td>
                                            <td>
                                                {{$roll->created_at}}
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