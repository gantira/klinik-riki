@extends('layouts.app', ['linkdokter' => 'active', 'linkdoktercreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Dokter</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Dokter</button>
		</div>
		<div class="panel-content">
	        {!! Form::open(['route' => 'dokter.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('dokter.form', ['button'=>'Add Dokter'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

