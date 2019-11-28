@extends('layouts.app', ['linkpendaftaran' => 'active', 'linkpendaftaranindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Antrian</h1>
			<hr>
		</div>
		<div class="panel-content">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-danger">
					  	<div class="panel-heading">Umum <span class="badge bg-danger">{{ $pendaftaran->count() }}</span></div>
					  	<div class="panel-body">
					  		<div class="table-responsive">
					  			<table class="table">
					  				<tr>
					  					<th>No</th>
					  					<th>Pasien</th>
					  					<th></th>
					  				</tr>
					  				@foreach ($pendaftaran as $row)
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


@endsection
