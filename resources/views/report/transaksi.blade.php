<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">
	<p>
		<img src="{{ asset('img/logo.png') }}" width="100px" align="left">
		
		<center>
		<strong>KLINIK UMMI MEDIKA</strong> <br>
		Jl. DR. KRT. Radjiman Widyodiningrat No. 54 <br>
		Waru Doyong, Buaran Jatinegara - Jakarta Timur <br>
		TELP. 46833267<br>
		<strong>Laporan Transaksi</strong>
		</center>
		</p>
		Periode Transaksi {!! $periode !!}
		<hr>
	<table border="1" width="100%" style="border-style: dashed; font-family: consolas">
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
			</tr>
			@php
				$total += $row->transaksiObat->sum('total') + $row->transaksiTindakan->sum('total');
			@endphp
			@if ($loop->last)
        		<tr style="font-weight: bolder;">
        			<td colspan="5" align="right">Total</td>
        			<td>Rp. {!! number_format($total) !!}</td>
        			<td></td>
        		</tr>
    		@endif
			@endforeach
		</tbody>
	</table>

	<p align="right">Terima kasih atas kunjungannya
		<br>
		<br>
		<br>
		<br>
		Penanggung Jawab <br>
		{!! \App\User::role('pemilik')->value('name') !!}
	</p>
</body>
</html>