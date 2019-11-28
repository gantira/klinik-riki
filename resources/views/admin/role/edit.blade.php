@extends('layouts.app', ['linkusermanagement' => 'active', 'linkrole' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
	    <div class="section-heading">
			<h1 class="page-title">User Management | <small>Edit Role</small></h1>
		</div>
		<hr>
		<div class="panel-content">
	        {!! Form::model($roles, ['route' => ['roles.update', $roles->id], 'method'=>'patch', 'class'=>'form-horizontal']) !!}

		        @include('admin.role.form', ['button'=>'Update'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

