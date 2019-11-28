<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
</head>
<body onload="window.print()">
		<p>
		<img src="{{ asset('img/logo.png') }}" width="100px" align="left">
		
		<center>
		<strong>KLINIK UMMI MEDIKA</strong> <br>
		Jl. DR. KRT. Radjiman Widyodiningrat No. 54 <br>
		Waru Doyong, Buaran Jatinegara - Jakarta Timur <br>
		TELP. 46833267
		</center>
		</p>
	<br>
		<hr>
	<table>
		<tr>
			<td width="20%"><strong>Nama Pasien</strong></td>
			<td width="5%">:</td>
			<td>{{ $transaksi->pasien->nama }}</td>
		</tr>
		<tr>
			<td><strong>Umur</strong></td>
			<td>:</td>
			<td>{{ $transaksi->pasien->umur }}</td>
		</tr>
		<tr>
			<td><strong>Diagnosa</strong></td>
			<td>:</td>
			<td>{{ $transaksi->diagnosa->nama }}</td>
		</tr>
		<tr>
			<td><strong>Dokter</strong></td>
			<td>:</td>
			<td>{{ $transaksi->user->name }}</td>
		</tr>
	</table>

	<br>

	<table border="1" width="100%" style="border-style: dashed; font-family: consolas" >
		<thead>
			<tr style="font-weight: bold;">
				<td>Nama Obat</td>
				<td>Jumlah Obat</td>
				<td>Jenis Obat</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($transaksi->resep as $row)
			<tr>
				<td>{{ $row->nama }}</td>
				<td>{{ $row->jml }}</td>
				<td>{{ $row->jenis }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
<br>
<br>
<br>
<br>
<p align="right">
	Terimakasih, <br><br><br>




	Ummi Klinik
</p>
</body>
</html>