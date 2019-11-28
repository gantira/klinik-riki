@extends('layouts.app', ['linktindakan' => 'active', 'linktindakanindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Laporan Transaksi</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-plus"></span></button>
			<a href="#" class="btn btn-info">Laporan Transaksi</a>
			<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default"><span class="fa fa-calendar"></span>Per Tanggal</a>
		</div>
		<div class="panel-content">
			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>No</th>
			            		<th>Kode Transaksi</th>
			            		<th>Jenis</th>
			            		<th>Pasien</th>
			            		<th>Dokter</th>
			            		<th>Total Harga</th>
			            		<th>Tanggal Masuk</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@php
		            			$total = 0;
		            		@endphp
		            		@foreach ($transaksi as $row)
		            		<tr>
		            			<td>{!! $loop->iteration !!}</td>
		            			<td>{!! $row->kode_transaksi !!}</td>
		            			<td>{!! $row->jenis !!}</td>
		            			<td>{!! $row->pasien->nama !!}</td>
		            			<td>{!! $row->user->name !!}</td>
		            			<td>Rp. {!! number_format($row->transaksiObat->sum('total') + $row->transaksiTindakan->sum('total')) !!}</td>
		            			<td>{!! $row->created_at !!}</td>
		            			@php
		            				$total += $row->transaksiObat->sum('total') + $row->transaksiTindakan->sum('total');
		            			@endphp
		            		</tr>
		            		@if ($loop->last)
			            		<tr style="font-weight: bolder;">
			            			<td colspan="5" class="text-right">Total</td>
			            			<td>Rp. {!! number_format($total) !!}</td>
			            		</tr>
		            			<tr>
		            				<td colspan="7"><a href="{{ url('cetak/transaksi?tgl_awal='.Request::get('tgl_awal').'&tgl_akhir='.Request::get('tgl_akhir')) }}" class="btn btn-info btn-sm"><span class="fa fa-print"></span>Cetak </a></td>
		            			</tr>
		            		@endif
		            		@endforeach
		            	</tbody>
		            </table>
			</div>
		</div>

	</div>
</div>

{!! Form::open(['route'=>'laporanTransaksi', 'method'=>'get']) !!}
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Laporan Transaksi</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Tanggal Awal</label>
					{!! Form::date('tgl_awal', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					<label>Tanggal Akhir</label>
					{!! Form::date('tgl_akhir', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Cek', ['btn btn-primary btn-block']) !!}
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
{!! Form::close() !!}
@endsection
