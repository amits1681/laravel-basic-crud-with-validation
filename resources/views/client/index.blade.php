@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	    
<?php 
 // echo "<pre>";
 //        print_r($clients);
 //        exit;
?>
<!-- LIST -->
<div class=col-md-12>
    
    <form id="form-list-client">
        <legend>List of clients</legend>

        <div class="pull-right">
            <!-- <a class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a> -->
            <a href="{{route('add')}}" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> New</a>
        </div>
        <table class="table table-bordered table-condensed table-hover">
            <thead>
                <tr>
                    <td>Name</td>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                    
            </thead>
            <tbody id="form-list-client-body">
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->status }}</td>
                        <td>
                            <a href="{{ url('clients/view/'.$client->id) }}" title="view this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                            <a href="{{ url('clients/edit/'.$client->id) }}" title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                            <a href="{{ url('clients/delete/'.$client->id) }}" title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                        </td>
                    </tr>
                @empty
                    <p>No clients</p>
                @endforelse                
            </tbody>
        </table>
    </form>    
</div>
	    
	</div>
</div>
@endsection