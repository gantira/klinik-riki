@extends('layouts.app', ['linkpasien' => 'active', 'linkpasiencreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="btn-group">
			<button type="button" class="btn btn-default" onclick="javascript:history.go(-1)"><span class="fa fa-chevron-left"></span></button>
			<a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">Edit Pasien</a>
			<a href="{{ route('pasien.create') }}" class="btn btn-info">Add New Pasien</a>
			<a href="{{ route('rekamedis.show', $pasien->id) }}" class="btn btn-success">Rekamedis</a>
		</div>
	    
	    <div class="profile-section">
	    	<h3 class="heading"> {{ $pasien->nama }} <small>{{ $pasien->kode_pasien }}</small></h3>
			<table class="table">
				<tr>
					<td width="20%"><strong>Nama Pasien</strong></td>
					<td>{{ $pasien->nama }}</td>
				</tr>
				<tr>
					<td><strong>ID Pasien</strong></td>
					<td>{{ $pasien->kode_pasien }}</td>
				</tr>
				<tr>
					<td><strong>Umur</strong></td>
					<td>{{ $pasien->tgl_lahir }}</td>
				</tr>
				<tr>
					<td><strong>Jenis Kelamin</strong></td>
					<td>{{ $pasien->jk }}</td>
				</tr>
				<tr>
					<td><strong>Phone</strong></td>
					<td>{{ $pasien->phone }}</td>
				</tr>
				<tr>
					<td><strong>Penanggung Jawab</strong></td>
					<td>{{ $pasien->peng_jawab }}</td>
				</tr>
			</table>
		</div>

	    <div class="profile-section">
	    	<h3 class="heading"> Rawat Jalan</h3>
			<table class="table" style="height: 100px">
				<thead>
					<tr>
						<th>ID Transaksi</th>
						<th>Dokter</th>
						<th>Diagnosis</th>
						<th>Tindakan</th>
						<th>Total Charge</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				
				@forelse ($pasien->transaksi->where('jenis', 'Umum') as $row)
				<tbody>
					<tr>
						<td><span class="label label-info">{{ $row->kode_transaksi }}</span></td>
						<td><span class="label label-info">{{ $row->user->name }}</span></td>
						<td><span class="label label-primary">{{ $row->diagnosa->nama }}</span></td>
						<td>
							@foreach ($row->transaksiTindakan as $val)
								<span class="label label-danger">{{ $val->tindakan->nama }}</span>
							@endforeach
						</td>
						<td>Rp. {{ number_format($row->transaksiObat->sum('total') + $row->transaksiTindakan->sum('total')) }}</td>
						<td>{{ $row->created_at }}</td>
						<td><span class="{{ $row->status == 'Dibayar' ? 'label label-success' : 'label label-warning' }}">{{ $row->status }}</span></td>
						<td>
							<div class="btn-group" role="group" aria-label="...">
							  	@if ($row->status == 'Belum Bayar')
							  	<button type="button" class="btn btn-success btn-sm" onclick="event.preventDefault();getElementById('paid{{$row->id}}').submit();">Paid</button>
								{{-- <a href="{{ route('resep.edit', $row->id) }}" class="btn btn-info btn-sm">Resep Obat</a> --}}
								<a href="{{ route('transaksi.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
							  	<button type="button" class="btn btn-danger btn-sm" onclick="event.preventDefault();getElementById('delete{{$row->id}}').submit();">Delete</button>
							  	@else
							  	<a href="{{ route('report.show', $row->id) }}" class="btn btn-default btn-sm"><span class="fa fa-print"></span> Cetak Kwitansi</a>
							  	<a href="{{ route('resepobat', $row->id) }}" class="btn btn-default btn-sm"><span class="fa fa-print"></span> Cetak Resep</a>
							  	<a href="{{ route('rujukan.show', $row->id) }}" class="btn btn-default btn-sm"><span class="fa fa-print"></span> Cetak Rujukan</a>
							  	@endif

							  	{!! Form::open(['route'=>['paid', $row->id], 'method'=>'patch', 'id'=>'paid'.$row->id]) !!}
							  	{!! Form::close() !!}
							  	{!! Form::open(['route'=>['transaksi.destroy', $row->id], 'method'=>'delete', 'id'=>'delete'.$row->id]) !!}
							  	{!! Form::close() !!}
							</div>
						</td>
					</tr>
				</tbody>
				@empty
				<tr>
					<td>No Result Found</td>
				</tr>
				@endforelse
			</table>
		</div>

	    <div class="profile-section">
	    	<h3 class="heading"> Bersalin</h3>
			<table class="table" style="height: 100px">
				<thead>
					<tr>
						<th>ID Transaksi</th>
						<th>Dokter</th>
						<th>Diagnosis</th>
						<th>Tindakan</th>
						<th>Total Charge</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				
				@forelse ($pasien->transaksi->where('jenis', 'Bersalin') as $row)
				<tbody>
					<tr>
						<td><span class="label label-info">{{ $row->kode_transaksi }}</span></td>
						<td><span class="label label-info">{{ $row->user->name }}</span></td>
						<td><span class="label label-primary">{{ $row->diagnosa->nama }}</span></td>
						<td>
							@foreach ($row->transaksiTindakan as $val)
								<span class="label label-danger">{{ $val->tindakan->nama }}</span>
							@endforeach
						</td>
						<td>Rp. {{ number_format($row->transaksiKamar->sum('total') + $row->transaksiObat->sum('total') + $row->transaksiTindakan->sum('total')) }}</td>
						<td>{{ $row->created_at }}</td>
						<td><span class="{{ $row->status == 'Dibayar' ? 'label label-success' : 'label label-warning' }}">{{ $row->status }}</span></td>
						<td>
							<div class="btn-group" role="group" aria-label="...">
							  	@if ($row->status == 'Belum Bayar')
							  	<button type="button" class="btn btn-success btn-sm" onclick="event.preventDefault();getElementById('paid{{$row->id}}').submit();">Paid</button>
								<a href="{{ route('resep.edit', $row->id) }}" class="btn btn-info btn-sm">Resep Obat</a>
								<a href="{{ route('transaksi.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
							  	<button type="button" class="btn btn-danger btn-sm" onclick="event.preventDefault();getElementById('delete{{$row->id}}').submit();">Delete</button>
							  	@else
							  	<a href="{{ route('report.show', $row->id) }}" class="btn btn-default btn-sm"><span class="fa fa-print"></span> Cetak Kwitansi</a>
							  	<a href="{{ route('resepobat', $row->id) }}" class="btn btn-default btn-sm"><span class="fa fa-print"></span> Cetak Resep</a>
							  	<a href="{{ route('rujukan.show', $row->id) }}" class="btn btn-default btn-sm"><span class="fa fa-print"></span> Cetak Rujukan</a>
							  	@endif

							  	{!! Form::open(['route'=>['paid', $row->id], 'method'=>'patch', 'id'=>'paid'.$row->id]) !!}
							  	{!! Form::close() !!}
							  	{!! Form::open(['route'=>['transaksi.destroy', $row->id], 'method'=>'delete', 'id'=>'delete'.$row->id]) !!}
							  	{!! Form::close() !!}
							</div>
						</td>
					</tr>
				</tbody>
				@empty
				<tr>
					<td>No Result Found</td>
				</tr>
				@endforelse
			</table>
		</div>
	</div>
</div>
@endsection

