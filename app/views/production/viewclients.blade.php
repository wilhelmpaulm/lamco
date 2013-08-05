@extends('layouts.production')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <table class="table  table-bordered table-striped dtable table-condensed" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contacts</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr class="">
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->contacts}}</td>
                        
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