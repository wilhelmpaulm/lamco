@extends('layouts.purchasing')
@section('main')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
           
            <div class="tabbable" id="tabs-299920">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#rolls-inventory" data-toggle="tab">Local Vendors</a>
                    </li>
                    <li>
                        <a href="#rolls-reserved" data-toggle="tab">Foreign Vendors</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="rolls-inventory">
                        <div class="row-fluid">
                            <div class="span12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Product
                                            </th>
                                            <th>
                                                Payment Taken
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                Default
                                            </td>
                                            <td>
                                                <a id="modal-771123" href="#modal-container-771123" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

                                            </td>
                                        </tr>
                                        <tr class="success">
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                Approved
                                            </td>
                                            <td>
                                                <a id="modal-771123" href="#modal-container-771123" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

                                            </td>
                                        </tr>
                                        <tr class="error">
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                02/04/2012
                                            </td>
                                            <td>
                                                Declined
                                            </td>
                                            <td>
                                                <a id="modal-771123" href="#modal-container-771123" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="rolls-reserved">
                        <p>
                            Howdy, I'm in Section 2.
                        </p>
                    </div>
                    <div class="tab-pane" id="rolls-danger">
                        <p>
                            Howdy, I'm in Section 2.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div id="modal-container-771123" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">
            Modal header
        </h3>
    </div>
    <div class="modal-body">
        <p>
            One fine body…
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> <button class="btn btn-primary">Save changes</button>
    </div>
</div>


@stop