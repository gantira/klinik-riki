@extends('layouts.app', ['linkusermanagement' => 'active', 'linkpermission' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
	    <div class="section-heading">
			<h1 class="page-title">User Management | <small>Edit Permission</small></h1>
		</div>
		<hr>
		<div class="panel-content">
	        {!! Form::model($permissions, ['route' => ['permissions.update', $permissions->id], 'method'=>'patch', 'class'=>'form-horizontal']) !!}

		        @include('admin.permission.form', ['button'=>'Update'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection
