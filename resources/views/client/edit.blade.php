@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- FORM  -->      
       <div class="col-md-12">
           
        {{ Form::open(array('url' => 'clients/update/'.$client->id, 'method' => 'put','class'=>'form-horizontal', 'files' => true)) }}
            <fieldset>

            <!-- Form Name -->
            <legend>Client</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="client-name">Name</label>  
              <div class="col-md-4">
              <input id="client-name" name="name" value="{{ $client->name }}" type="text" placeholder="your client's name" class="form-control input-md">
              </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="client-email">Email</label>
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">@</span>
                  <input id="client-email" value="{{ $client->email }}" name="email" class="form-control" placeholder="yourname@yourdomain.com" type="text">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="client-email">Profile picture</label>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="file" name="profile_picture">
                </div>
              </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="client-status">Client status</label>
              <div class="col-md-4">
              <div class="radio">
                <label for="client-status-0">
                  <input type="radio" {{ $client->status == 'active' ? 'checked' : ''}} name="status" id="client-status-0" value="active" checked="checked">
                  Active
                </label>
                </div>
              <div class="radio">
                <label for="client-status-1">
                  <input type="radio" {{ $client->status == 'inactive' ? 'checked' : ''}} name="status" id="client-status-1" value="inactive">
                  Inactive
                </label>
                </div>
              </div>
            </div>


            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="btn-save"></label>
              <div class="col-md-4">
                <button id="btn-save" name="btn-save" class="btn btn-success">Save</button>
              </div>
            </div>

            </fieldset>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        {{ Form::close() }}


       </div> 
    </div>
</div>
@endsection