@extends('layouts.sales')
@section('main')


<ul class="breadcrumb ">
    <li>
        <a href="#">Home</a> <span class="divider">/</span>
    </li>
    <li>
        <a href="#">Purchasing</a> <span class="divider">/</span>
    </li>
    <li class="active">
        Create Purchase Order
    </li>
</ul>
<form id="mamamia"  class="" action="{{URL::to('sales/add-sales-order')}}" method="post">
    <div class="row-fluid">
        <div class="span12">
            <select class="input-large" name="client">
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
            <select class="input-large" name="terms">
                @foreach($terms as $term)
                <option value="{{$term->term}}">{{$term->term}}</option>
                @endforeach
            </select>
            <br><br>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span2"></div>
        <div class="span8">
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>dsf</th>
                            <th>sv</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sdv</td>
                            <td>asdf</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="span2"></div>
    </div>

</form>


<div class="hidden">

</div>



</div>
<script>
   
</script>


@stop