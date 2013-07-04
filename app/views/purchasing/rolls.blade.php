@extends('layouts.purchasing')
@section('main')

<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>id</th>
                    <th></th>
                </tr>
            </thead>
            @foreach($rolls as $roll)
            <tbody>
                <tr>
                    <td>{{$roll->id}}</td>
                    <td></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
<div class="row-fluid">
  
</div>


@stop