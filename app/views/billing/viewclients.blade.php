@extends('layouts.billing')
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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr class="">
                        <td>{{$client->id}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->contacts}}</td>
                        <td>
                            <form action="{{URL::to('sales/edit-client')}}" method="POST">
                                <input type="hidden" name="id" value="{{$client->id}}" />
                                <input type="submit" class="btn btn-warning" value="Edit" />
                            </form>
                        </td>
                        <td>
                            <form action="{{URL::to('sales/delete-client')}}" method="POST">
                                <input type="hidden" name="id" value="{{$client->id}}" />
                                <input type="submit" class="btn btn-danger" value="Delete" />
                            </form>
                        </td>
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