@extends('layouts.purchasing')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">

            <div class="tabbable" >
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#reminder-list" data-toggle="tab">Reminders ({{$reminders->count()}})</a>
                    </li>
                    <li>
                        <a href="#reminder-make" data-toggle="tab">Create Reminder</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="reminder-list">

                        <div class="row-fluid">
                            <div class="span12" style="">
                                <table class="table table-condensed  table-striped table-hover dtable" >
                                    <thead>
                                        <tr class="">
                                            <th width='10%'>By</th>
                                            <th width='10%'>Deadline</th>
                                            <th>Reminder</th>
                                            <th width='5%'></th>
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
                                            class='error'
                                            @endif
                                            >
                                            <td>{{User::find($reminder->created_by)->last_name}}, {{User::find($reminder->created_by)->first_name}}</td>
                                            <td>{{$reminder->deadline}}</td>
                                            <td>{{$reminder->reminder}}</td>
                                            <td>
                                                <form action="{{URL::to('purchasing/delete-reminder')}}" method="post">
                                                    <input type="hidden" name="id" value="{{$reminder->id}}" />
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
                    <div class="tab-pane" id="reminder-make">
                        <form action="{{URL::to('purchasing/add-reminder')}}" method="post">
                            <div class="row-fluid">
                                <div class="span3">
                                    <label for="deadline">Deadline</label>
                                    <input id="deadline" class="input-block-level" type="date" name="deadline" value="" />
                                    <br>
                                    <br>
                                    <label for="created_for">Reminder For</label>
                                    <select id="created_for"  name="created_for" class="input-block-level sel2">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" >{{$user->department}} | {{$user->last_name}}, {{$user->first_name}} | {{$user->job_title}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label for="importance">Importance</label>
                                    <select id="importance" name="importance" class="input-block-level">
                                        <option>low</option>
                                        <option>mid</option>
                                        <option>high</option>
                                    </select>
                                </div>
                                <div class="span6">
                                    <label for="reminder">Reminder</label>
                                    <textarea id="reminder" class="input-block-level" name="reminder"  rows="4" cols="20"></textarea>
                                    <input type="submit" class="btn btn-info pull-right" value="Create Reminder" />
                                </div>
                            </div>
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
//    $(document).ready(function() {
    $('.dtable').dataTable();
    $('.sel2').select2();
//    });
</script>


@stop