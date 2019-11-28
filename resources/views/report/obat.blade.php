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
		<strong>Laporan Obat</strong>
		</center>
		</p>
        Periode Transaksi {!! $periode !!}
		<hr>
	<table border="1" width="100%" style="border-style: dashed; font-family: consolas">
		<thead>
    		<tr>
        		<th>No</th>
        		<th>Kode Obat</th>
        		<th>Nama</th>
        		<th>Jenis</th>
        		<th>Harga PerUnit</th>
        		<th>Tanggal Pesan</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach ($obat as $row)
    		<tr>
    			<td>{!! $loop->iteration !!}</td>
    			<td>{!! $row->kode_obat !!}</td>
    			<td>{!! $row->nama !!}</td>
    			<td>{!! $row->jenis !!}</td>
    			<td>Rp. {!! number_format($row->harga_perunit) !!}</td>
    			<td>{!! $row->created_at !!}</td>
    		</tr>
    		@if ($loop->last)
        		<tr style="font-weight: bolder;">
        			<td colspan="4" align="right">Total</td>
        			<td>Rp. {!! number_format($obat->sum('harga_perunit')) !!}</td>
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