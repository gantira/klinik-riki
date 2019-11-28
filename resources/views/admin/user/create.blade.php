@extends('layouts.app', ['linkusermanagement' => 'active', 'linkuser' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
	    <div class="section-heading">
			<h1 class="page-title">User Management | <small>Create User</small></h1>
		</div>
		<hr>
		<div class="panel-content">
	        {!! Form::open(['route' => 'users.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('admin.user.form', ['button'=>'Create'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

