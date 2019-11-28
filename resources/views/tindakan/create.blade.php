@extends('layouts.app', ['linktindakan' => 'active', 'linktindakancreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Tindakan</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Tindakan</button>
		</div>

		<div class="panel-content">
	        {!! Form::open(['route' => 'tindakan.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('tindakan.form', ['button'=>'Add Tindakan'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

