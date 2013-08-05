@extends('layouts.admin')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <table class="table  table-bordered table-striped dtable table-condensed" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>User</th>
                        <th width="50%">Action</th>
                        <th>Reference</th>
                        <th>date</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($sys_logs as $log)
                    <tr class="">
                        <td>{{$log->id}}</td>
                        <td>{{$log->department}}</td>
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