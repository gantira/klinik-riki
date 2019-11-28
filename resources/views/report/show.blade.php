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
			<td>{{ \Carbon\Carbon::createFromDate(\Carbon\Carbon::parse($transaksi->pasien->tgl_lahir)->year, \Carbon\Carbon::parse($transaksi->pasien->tgl_lahir)->month, \Carbon\Carbon::parse($transaksi->pasien->tgl_lahir)->day)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan dan %d hari') }}</td>
		</tr>
		<tr>
			<td><strong>Diagnosa</strong></td>
			<td>:</td>
			<td>{{ $transaksi->diagnosa->nama }}</td>
		</tr>
	</table>

	<br>

	<table border="1" width="100%" style="border-style: dashed; font-family: consolas" >
		<thead>
			<tr style="font-weight: bold;">
				<td>Kode</td>
				<td>Nama</td>
				<td>Qty</td>
				<td>Subtotal</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($transaksi->transaksiObat as $row)
			<tr>
				<td>{{ $row->obat->kode_obat }}</td>
				<td>{{ $row->obat->nama }}</td>
				<td>{{ $row->jml_obat }} {{ $row->obat->jenis }}</td>
				<td>Rp. {{ number_format($row->total) }} </td>
			</tr>
			@endforeach

			@foreach ($transaksi->transaksiKamar as $row)
			<tr>
				<td>{{ $row->kamar->kode_kamar }}</td>
				<td>{{ $row->kamar->nama }} (lama inap {{ $row->lama_inap }} hari)</td>
				<td></td>
				<td>Rp. {{ number_format($row->total) }} </td>
			</tr>
			@endforeach

			@foreach ($transaksi->transaksiTindakan as $row)
			<tr>
				<td>{{ $row->tindakan->kode_tindakan }}</td>
				<td>{{ $row->tindakan->nama }}</td>
				<td></td>
				<td>Rp. {{ number_format($row->total) }} </td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr style="font-weight: bold;">
				<td></td>
				<td></td>
				<td>Total</td>
				<td>Rp. {{ number_format($transaksi->transaksiKamar->sum('total') + $transaksi->transaksiObat->sum('total')+ $transaksi->transaksiTindakan->sum('total')) }}</td>
			</tr>
		</tfoot>
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