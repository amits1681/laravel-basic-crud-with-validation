@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<!-- view -->

<div class="col-md-12">
    
    <legend>View client</legend>
    
    <div >        
      <div class2=" col-md-9 col-lg-9 "> 
          <table class="table table-user-information">
            <tbody>
              <tr>
                <td>Name:</td>
                <td>{{ $client->name }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></td>
              </tr>
            </tbody>
          </table>
    </div>
        
        
    </div>
           

</div>
	   
	</div>
</div>
@endsection