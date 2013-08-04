@extends('layouts.delivery')
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
                        <a href="#memos-list" data-toggle="tab">Memos ({{$memos->count()}})</a>
                    </li>
                    <li>
                        <a href="#memos-make" data-toggle="tab">Create Memo</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="memos-list">

                        <div class="row-fluid">
                            <div class="span12" style="">
                                <table class="table table-condensed  table-striped table-hover dtable" >
                                    <thead>
                                        <tr class="">
                                            <th width='10%'>By</th>
                                            <th width='10%'>Deadline</th>
                                            <th>Memo</th>
                                            <th width='5%'></th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($memos as $memo)
                                        <tr 
                                            @if($memo->importance == 'low')
                                            class='info'
                                            @elseif($memo->importance == 'mid')
                                            class='warning'
                                            @elseif($memo->importance == 'high')
                                            class='error'
                                            @endif
                                            >
                                            <td>{{User::find($memo->created_by)->last_name}}, {{User::find($memo->created_by)->first_name}}</td>
                                            <td>{{$memo->deadline}}</td>
                                            <td>{{$memo->memo}}</td>
                                            <td>
                                                <form action="delivery/delete-memo" method="post">
                                                    <input type="hidden" name="id" value="{{$memo->id}}" />
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
                    <div class="tab-pane" id="memos-make">
                        <form action="{{URL::to('delivery/add-memo')}}" method="post">
                            <div class="row-fluid">
                                <div class="span3">
                                    <label for="deadline">Deadline</label>
                                        <input id="deadline" class="input-block-level" type="date" name="deadline" value="" />
                                        <br>
                                        <br>
                                        <label for="created_for">Memo For</label>
                                        <select id="created_for"  name="department" class="input-block-level sel2">
                                            @foreach($departments as $department)
                                            <option value="{{$department->department}}" >{{$department->department}}</option>
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
                                    <label for="memo">Memo</label>
                                    <textarea id="memo" class="input-block-level" name="memo"  rows="4" cols="20"></textarea>
                                    <input type="submit" class="btn btn-info pull-right" value="Create Memo" />
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