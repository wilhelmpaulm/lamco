@extends('layouts.admin')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <table class="table  table-bordered table-striped dtable table-condensed" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>client</th>
                        <th>department</th>
                        <th>user</th>
                        <th width="50%">action</th>
                        <th>reference</th>
                        <th>date</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($pro_logs as $log)
                    <tr class="">
                        <td>{{$log->id}}</td>
                        <td>{{$client->department}}</td>
                        <td>{{$client->client}}</td>
                        <td>{{$log->user}}</td>
                        <td>{{$log->action}}</td>
                        <td>{{$log->reference}}</td>
                        <td>{{$log->created_at}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

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