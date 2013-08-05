@extends('layouts.management')
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
                    @foreach($suppliers as $supplier)
                    <tr class="">
                        <td>{{$supplier->id}}</td>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->address}}</td>
                        <td>{{$supplier->contacts}}</td>
                        <td>
                            <form action="{{URL::to('management/edit-supplier')}}" method="POST">
                                <input type="hidden" name="id" value="{{$supplier->id}}" />
                                <input type="submit" class="btn btn-warning" value="Edit" />
                            </form>
                        </td>
                        <td>
                            <form action="{{URL::to('management/delete-supplier')}}" method="POST">
                                <input type="hidden" name="id" value="{{$supplier->id}}" />
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