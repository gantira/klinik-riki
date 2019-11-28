@extends('layouts.app', ['linkalkes' => 'active', 'linkalkescreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Alkes</button>
		</div>
		<div class="panel-content">
	        {!! Form::open(['route' => 'alkes.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('alkes.form', ['button'=>'Add Alkes'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

