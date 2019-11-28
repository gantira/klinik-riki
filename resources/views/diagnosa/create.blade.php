@extends('layouts.app', ['linkdiagnosa' => 'active', 'linkdiagnosacreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Diagnosa</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Diagnosis</button>
		</div>
		<div class="panel-content">
	        {!! Form::open(['route' => 'diagnosa.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('diagnosa.form', ['button'=>'Add Diagnosis'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

