@extends('layouts.app', ['linkpasien' => 'active', 'linkpasiencreate' => 'active'])

@push('style')
	<style type="text/css">
		.table.no-border tr td, .table.no-border tr th {
		  border-width: 0;
		}
	</style>
@endpush
@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Rekamedis</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
		</div>
		<div class="panel-content">
			<table class="table no-border">
				<tr>
					<th width="10%">Pasien</th>
					<td width="1%">:</td>
					<td>{!! $rekamedis->nama !!}</td>
				</tr>
				<tr>
					<th>Umur</th>
					<td>:</td>
					<td>{!! $rekamedis->umur !!}</td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td>{!! $rekamedis->kelurahan .', '. $rekamedis->kota !!}</td>
				</tr>
			</table>

	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>Dokter</th>
	        			<th>Diagnosa</th>
	        			<th>Tindakan</th>
	        			<th>Tanggal</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		@foreach ($rekamedis->transaksi as $row)
	        		<tr>
	        			<td>{!! $row->user->name !!}</td>
	        			<td>{!! $row->diagnosa->nama !!}</td>
	        			<td>@foreach ($row->transaksiTindakan as $tindakan)
	        				{!! $tindakan->tindakan->nama !!}
	        			@endforeach
	        			</td>
	        			<td>{!! $row->created_at->format('d, M Y') !!}</td>
	        		</tr>
	        		@endforeach
	        	</tbody>
	        </table>
	    </div>
	    
	</div>
</div>
@endsection

