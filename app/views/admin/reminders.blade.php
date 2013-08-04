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
            <div class="tabbable" >
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#reminder-list" data-toggle="tab">Reminders ({{$reminders->count()}})</a>
                    </li>
                    <li>
                        <a href="#reminder-make" data-toggle="tab">Make Reminder</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="reminder-list">

                        <div class="row-fluid">
                            <div class="span12" style="">
                                <table class="table table-condensed table-bordered table-striped table-hover dtable" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>By</th>
                                            <th>Deadline</th>
                                            <th>Reminder</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($reminders as $reminder)
                                        <tr 
                                            @if($reminder->importance == 'low')
                                            class='info'
                                            @elseif($reminder->importance == 'mid')
                                            class='warning'
                                            @elseif($reminder->importance == 'high')
                                            class='danger'
                                            @endif
                                            >
                                            <td>{{$reminder->id}}</td>
                                            <td>{{$reminder->created_by}}</td>
                                            <td>{{$reminder->deadline}}</td>
                                            <td>{{$reminder->reminder}}</td>

                                            <td>
                                                <form action="delete-reminder" method="post">
                                                    <input type="hidden" name="id" value="{{$reminder->id}}" />
                                                    <input type="submit" class="btn btn-danger" value="Delete Reminder" />
                                                </form>
                                            </td>



                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="reminder-make">
                        <div class="row-fluid">
                            <div class="span12">


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