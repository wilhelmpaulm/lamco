@extends('layouts.admin')
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
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12" style="">
            <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Department
                        </th>
                        <th>
                            Job Title
                        </th>
                        <th>

                        </th>
                        <th>

                        </th>
                       

                    </tr>
                </thead>
                <tbody >
                    @foreach($users as $user)
                    <tr >
                        <td>{{$user->id}}</td>
                        <td>{{$user->last_name}}, {{$user->first_name}}</td>
                        <td>{{$user->department}}</td>
                        <td>{{$user->job_title}}</td>
                        <td>
                            <form action="edit-user" method="post">
                                <input type="hidden" name="id" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-warning" value="Edit User" />
                            </form>
                        </td>
                        <td>
                            <form action="delete-user" method="post">
                                <input type="hidden" name="id" value="{{$user->id}}" />
                                <input type="submit" class="btn btn-danger" value="Delete User" />
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



<script >
//    $('#example').dataTable();
    $(document).ready(function() {
        $('.dtable').dataTable();
    });
</script>


@stop