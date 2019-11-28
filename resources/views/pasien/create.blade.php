@extends('layouts.app', ['linkpasien' => 'active', 'linkpasiencreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Pasien</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Pasien</button>
		</div>
		<div class="panel-content">
	        {!! Form::open(['route' => 'pasien.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('pasien.form', ['button'=>'Add Pasien'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

