@extends('layouts.app', ['linkpendaftaran' => 'active', 'linkpendaftaranindex' => 'active'])

@push('style')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Pendaftaran</h1>
			<hr>
			<div class="action-buttons">
				
				{{-- <a href="#" class="btn btn-default"><i class="fa fa-file-text-o"></i> View Campaign Details</a> --}}
			</div>
		</div>
		<div class="panel-content">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-danger">
					  	<div class="panel-heading">Poly Umum
						  	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_umum"><i class="fa fa-plus-circle"></i></a> 
						</div>
					  	<div class="panel-body">
					  		<div class="table-responsive">
					  			<table class="table">
					  				<tr>
					  					<th>No</th>
					  					<th>Pasien</th>
					  					<td></td>
					  				</tr>
					  				@foreach ($pendaftaran->where('jenis', 'Umum') as $row)
					  				<tr>
					  					<td>{{ $loop->iteration }}</td>
					  					<td>{{ $row->pasien->nama }}</td>
					  					<td><a href="{{ route('antrian.show', $row->id) }}" class="btn btn-primary">Cek</a></td>
					  				</tr>
					  				@endforeach
					  			</table>
					  		</div>
					  	</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-danger">
					  	<div class="panel-heading">Bersalin
						  	<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_bersalin"><i class="fa fa-plus-circle"></i></a> 
						  </div>
					  	<div class="panel-body">
					  		<div class="table-responsive">
								<table class="table">
					  				<tr>
					  					<th>No</th>
					  					<th>Pasien</th>
					  					<th></th>
					  				</tr>
					  				@foreach ($pendaftaran->where('jenis', 'Bersalin') as $row)
					  				<tr>
					  					<td>{{ $loop->iteration }}</td>
					  					<td>{{ $row->pasien->nama }}</td>
					  					<td><a href="{{ route('antrian.show', $row->id) }}" class="btn btn-primary">Cek</a></td>
					  				</tr>
					  				@endforeach
					  			</table>
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- Modal -->
<div id="myModal_umum" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		{!! Form::open(['route'=>'pendaftaran.store', 'method'=>'post']) !!}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Daftar Pasien</h4>
			</div>
			<div class="modal-body">
                <div class="form-group">
                    <label">Pasien</label>
                    {!! Form::select('pasien_id', $pasien, null, ['class'=>'js-example-basic-single', 'style'=>'width: 100%']) !!}
                </div>
                
                <div class="form-group">
                    <label">Jenis Pasien</label>
                    {!! Form::select('jenis', ['Umum'=>'Umum'], null, ['class'=>'js-example-basic-single', 'style'=>'width: 100%']) !!}
                </div>
                
                <div class="form-group">
                    <label class="control-label">Keterangan</label>
                    {!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
                </div> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" >Submit</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
<!-- Modal -->
<div id="myModal_bersalin" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		{!! Form::open(['route'=>'pendaftaran.store', 'method'=>'post']) !!}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Daftar Pasien</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
                    <label">Pasien</label>
                    {!! Form::select('pasien_id', $pasien_perempuan, null, ['class'=>'js-example-basic-single', 'style'=>'width: 100%']) !!}
                </div>
                
                <div class="form-group">
                    <label">Jenis Pasien</label>
                    {!! Form::select('jenis', ['Bersalin'=>'Bersalin'], null, ['class'=>'js-example-basic-single', 'style'=>'width: 100%']) !!}
                </div>
                
                <div class="form-group">
                    <label class="control-label">Keterangan</label>
                    {!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
                </div> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" >Submit</button>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<script>
		$(document).ready(function() {
		    $('.js-example-basic-single').select2();
		});
	</script>
@endpush