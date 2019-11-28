@extends('layouts.app', ['linkusermanagement' => 'active', 'linkpermission' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
	    <div class="section-heading">
			<h1 class="page-title">User Management | <small>Create Permission</small></h1>
		</div>
		<hr>
		<div class="panel-content">
	        {!! Form::open(['route' => 'permissions.store', 'method'=>'post', 'class'=>'form-horizontal']) !!}

		        @include('admin.permission.form', ['button'=>'Craete'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection
