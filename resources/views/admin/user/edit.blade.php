@extends('layouts.app', ['linkusermanagement' => 'active', 'linkuser' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
	    <div class="section-heading">
			<h1 class="page-title">User Management | <small>Edit User</small></h1>
		</div>
		<hr>
		<div class="panel-content">
	        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method'=>'patch', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('admin.user.form', ['button'=>'Update'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

