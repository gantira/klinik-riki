@extends('layouts.app', ['linkusermanagement' => 'active', 'linkrole' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
	    <div class="section-heading">
			<h1 class="page-title">User Management | <small>Create Role</small></h1>
		</div>
		<hr>
		<div class="panel-content">
	        {!! Form::open(['route' => 'roles.store', 'method'=>'post', 'class'=>'form-horizontal']) !!}

		        @include('admin.role.form', ['button'=>'Create'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

