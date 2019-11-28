@extends('layouts.app', ['linktransaksi' => 'active', 'linktransaksicreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Transaksi</button>
		</div>

		<div class="panel-content">
	        {!! Form::open(['route' => 'transaksi.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('transaksi.form', ['button'=>'Add Transaksi'])

	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

