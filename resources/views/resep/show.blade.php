@extends('layouts.app', ['linkresep' => 'active', 'linkresepcreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Resep</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<a href="{{ route('pasien.show', $transaksi->pasien->id) }}" type="button" class="btn btn-default">Pasien {!! $transaksi->pasien->nama !!}</a>
		</div>
		<div class="panel-content">
	        	<div class="row">

			        {!! Form::open(['route' => 'resep.store', 'method'=>'post', 'class'=>'form-horizontal']) !!}
		        	<div class="col-lg-5">
			        	@include('resep.form', ['button'=>'Add Resep'])
		        	</div>
		        	{!! Form::close() !!}
		        	<div class="col-lg-5">
		        		<div class="panel panel-default">
						  	<div class="panel-heading">Daftar Resep Obat</div>
						  	<div class="panel-body">
						  		<table class="table">
						  			<thead>
						  				<tr>
						  					<th>Nama Obat</th>
						  					<th>Jumlah Obat</th>
						  					<th>Jenis Obat</th>
						  				</tr>
						  			</thead>
						  			<tbody>
						  				@foreach ($resep as $row)
						  				<tr>
						  					<td>{!! $row->nama !!}</td>
						  					<td>{!! $row->jml !!}</td>
						  					<td>{!! $row->jenis !!}</td>
						  				</tr>
						  				@endforeach
						  			</tbody>
						  		</table>
						  	</div>
						</div>
		        	</div>

	        	</div>
	        
	    </div>
	    
	</div>
</div>
@endsection

