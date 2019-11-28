@extends('layouts.app', ['linkobat' => 'active', 'linkobatedit' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Obat</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Edit Obat</button>
		</div>
		
		<div class="panel-content">
	        {!! Form::model($obat, ['route' => ['obat.update', $obat->id], 'method'=>'patch', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('obat.form', ['button'=>'Update'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection
