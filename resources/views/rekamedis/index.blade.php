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

	        <table class="table">
	        	<thead>
	        		<tr>
	        			<th>No</th>
	        			<th>Pasien</th>
	        			<th>Dokter</th>
	        			<th>Diagnosa</th>
	        			<th>Tindakan</th>
	        			<th>Kota</th>
	        			<th>Kelurahan</th>
	        			<th>Penanggung Jawab</th>
	        			<th>Tanggal</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		@foreach ($rekamedis as $row)
	        		<tr>
	        			<td>{!! $loop->iteration !!}</td>
	        			<td>{!! $row->pasien->nama !!}</td>
	        			<td><label class="label label-info">{!! $row->user->name !!}</label></td>
	        			<td>{!! $row->diagnosa->nama !!}</td>
	        			<td>@foreach ($row->transaksiTindakan as $tindakan)
	        				{!! $tindakan->tindakan->nama !!}
	        			@endforeach
	        			</td>
	        			<td>{!! $row->pasien->kota !!}</td>
	        			<td>{!! $row->pasien->kelurahan !!}</td>
	        			<td>{!! $row->pasien->peng_jawab !!}</td>
	        			<td>{!! $row->created_at->format('d, M Y') !!}</td>
	        		</tr>
	        		@endforeach
	        	</tbody>
	        </table>
	    </div>
	    
	</div>
</div>
@endsection

