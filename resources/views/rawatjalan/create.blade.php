@extends('layouts.app', ['linkrawatjalan' => 'active', 'linkrawatjalancreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Rawat Jalan</button>
		</div>

		<div class="panel-content">
	        {!! Form::open(['route' => 'rawatjalan.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('rawatjalan.form', ['button'=>'Add Rawat Jalan'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

