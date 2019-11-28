<!DOCTYPE html>
<html>
<head>
	<title>Kartu Pasien</title>
	<style>
	* {
	    box-sizing: border-box;
	}

	/* Create two equal columns that floats next to each other */
	.column {
	    float: left;
	    width: 50%;
	}

	/* Clear floats after the columns */
	.row:after {
	    content: "";
	    display: table;
	    clear: both;
	}
	</style>
</head>
<body onload="window.print()">
	<fieldset>
		
		<p>

		<center>
		<strong>KLINIK UMMI MEDIKA</strong> <br>
		Jl. DR. KRT. Radjiman Widyodiningrat No. 54 <br>
		Waru Doyong, Buaran Jatinegara - Jakarta Timur <br>
		TELP. 46833267
		</center>
		</p>
		<br>

		<div class="row">
			
			<table border="0" width="100%">
				<thead>
					<tr valign="bottom">
						<td rowspan="7"><img src="{{ asset('img/logo.png') }}" width="100px" align="left"></td>
					</tr>
					<tr>
						<th>Rekam Medis</th>
					<th>:</th>
						<td>{{  substr($pasien->kode_pasien, 3, strlen($pasien->kode_pasien)) }}</td>
					</tr>
					<tr>
						<th>Dr</th>
						<th>:</th>
						<td>Zaenuri, Spog</td>
					</tr>
					<tr>
						<td colspan="3" align="center"><h4>Kartu Pasien</h4></td>
					</tr>
					<tr>
						<th>Nama</th>
						<th>:</th>
						<td>{!! $pasien->nama !!}</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<th>:</th>
						<td>{!! $pasien->kota . ' ' . $pasien->kelurahan !!}</td>
					</tr>
					<tr>
						<th>Tlp</th>
						<th>:</th>
						<td>{!! $pasien->phone !!}</td>
					</tr>
				</thead>
			</table>
				
		</div>
		<br>
			
	</fieldset>

	<table border="1" style="width: 100%; page-break-before: always">
		<thead>
			<tr align="center">
				<td colspan="4">DIPESAN UNTUK DATANG KEMBALI</td>		
			</tr>
			<tr align="center">
				<td>HARI</td>
				<td>TANGGAL</td>
				<td>HARI</td>
				<td>TANGGAL</td>
			</tr>
		</thead>
		<tbody>
			@for ($i = 0; $i < 35; $i++)
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			@endfor
		</tbody>
	</table>




</body>
</html>