@extends('layouts.app', ['linktransaksi' => 'active', 'linktransaksiindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="btn-group">
			<a href="#" class="btn btn-default" onclick="javascript:history.go(-1)"> <span class="fa fa-chevron-left"></span></a>
		</div>
		<div class="panel-content">
	        {!! Form::model($transaksi, ['route' => ['transaksi.update', $transaksi->id], 'method'=>'patch', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('transaksi.form', ['button'=>'Update'])

	        {!! Form::close() !!}
	    </div>
	    {!! Form::open(['route'=>'transaksiTindakan.store', 'class'=>'form-horizontal']) !!}
 			{!! Form::hidden('transaksi_id', $transaksi->id, []) !!}
 			{!! Form::hidden('jenis', 'tindakan', []) !!}
	    	<div class="form-group">
	    		<div class="col-sm-4">
	        		{!! Form::select('tindakan_id', $tindakan, null, ['class'=>'form-control', 'placeholder'=>'Pilih Tindakan', 'required']) !!}
	    		</div>
	    		<div class="col-sm-2">
	        		{!! Form::select('user_id', $dokter, null, ['class'=>'form-control', 'placeholder'=>'Pilih Dokter', 'required']) !!}
	    		</div>
	    		<div class="col-sm-4">
	    			{!! Form::submit('Add Tindakan', ['class'=>'btn btn-primary btn-sm']) !!}
	    		</div>
	    	</div>
    	{!! Form::close() !!}

	    {!! Form::open(['route'=>'transaksiObat.store', 'class'=>'form-horizontal']) !!}
 			{!! Form::hidden('transaksi_id', $transaksi->id, []) !!}
 			{!! Form::hidden('jenis', 'obat', []) !!}
	    	<div class="form-group">
	    		<div class="col-sm-4">
	        		{!! Form::select('obat_id', $obat, null, ['class'=>'form-control', 'placeholder'=>'Pilih Obat', 'required']) !!}
	    		</div>
	    		<div class="col-sm-2">
	    			{!! Form::number('jml_obat', null, ['class'=>'form-control', 'min'=>1, 'placeholder'=>'Jumlah Obat', 'required']) !!}
	    		</div>
	    	{{-- 	<div class="col-sm-2">
	    			{!! Form::text('resep_obat', null, ['class'=>'form-control', 'min'=>1, 'placeholder'=>'Aturan Pemakaian Obat', 'required']) !!}
	    		</div> --}}
	    		<div class="col-sm-4">
	    			{!! Form::submit('Add Obat', ['class'=>'btn btn-primary btn-sm']) !!}
	    		</div>
	    	</div>
    	{!! Form::close() !!}

	    {!! Form::open(['route'=>'resep.store', 'class'=>'form-horizontal']) !!}
	    	<small>*tebusan resep ke apotek lain</small>
 			{!! Form::hidden('transaksi_id', $transaksi->id, []) !!}
	    	<div class="form-group">
	    		<div class="col-sm-4">
	        		{!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
	    		</div>
	    		<div class="col-sm-2">
	    			{!! Form::number('jml', null, ['class'=>'form-control', 'min'=>1, 'placeholder'=>'Jumlah Obat', 'required']) !!}
	    		</div>
	    		<div class="col-sm-2">
	    			{!! Form::text('jenis', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
	    		</div>
	    		<div class="col-sm-4">
	    			{!! Form::submit('Add Resep', ['class'=>'btn btn-primary btn-sm']) !!}
	    		</div>
	    	</div>
    	{!! Form::close() !!}

    	@if ($transaksi->jenis == 'Bersalin')
	    {!! Form::open(['route'=>'transaksiKamar.store', 'class'=>'form-horizontal']) !!}
 			{!! Form::hidden('transaksi_id', $transaksi->id, []) !!}
 			{!! Form::hidden('jenis', 'kamar', []) !!}
	    	<div class="form-group">
	    		<div class="col-sm-4">
	        		{!! Form::select('kamar_id', $kamar, null, ['class'=>'form-control', 'placeholder'=>'Pilih Kamar', 'required']) !!}
	    		</div>
	    		<div class="col-sm-2">
	        		{!! Form::number('lama_inap', null, ['class'=>'form-control', 'placeholder'=>'Lama Inap', 'required']) !!}
	    		</div>
	    		<div class="col-sm-4">
	    			{!! Form::submit('Add Kamar', ['class'=>'btn btn-primary btn-sm']) !!}
	    		</div>
	    	</div>
    	{!! Form::close() !!}
    	@endif

    	<br>
    	<br>

	    <div class="table-responsive">
	    	<table class="table table-striped table-hover">
	    		@foreach ($transaksi->transaksiTindakan as $row)
	    		@if ($loop->first)
		    		<tr>
		    			<th>Nama Tindakan</th>
		    			<th></th>
		    			<th></th>
		    			<th>Total</th>
		    			<th></th>
		    		</tr>
	    		@endif
	    		<tbody>
	    			<tr>
	    				<td>{!! $row->tindakan->nama !!}</td>
	    				<td></td>
	    				<td></td>
	    				<td>Rp. {!! number_format($row->total) !!}</td>
	    				<td><a href="{{ route('transaksiObat.destroy', $row->id) }}" onclick="event.preventDefault();getElementById('destroy{{$row->id}}').submit();">&times;</a>
	    					{!! Form::open(['route'=>['transaksiObat.destroy', $row->id], 'method'=>'delete', 'id'=>'destroy'.$row->id]) !!}
	    					{!! Form::close() !!}
	    				</td>
	    			</tr>
	    		</tbody>
	    		@if ($loop->last)
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td align="right"><strong>Subtotal</strong></td>
	    				<td><strong>Rp. {{ number_format($transaksi->transaksiTindakan->sum('total')) }}</strong></td>
	    				<td></td>
	    			</tr>
	    		@endif
	    		@endforeach

	    		@foreach ($transaksi->transaksiKamar as $row)
	    		@if ($loop->first)
		    		<tr>
		    			<th>Nama Kamar</th>
		    			<th>Lama Inap</th>
		    			<th></th>
		    			<th>Total</th>
		    			<th></th>
		    		</tr>
	    		@endif
	    		<tbody>
	    			<tr>
	    				<td>{!! $row->kamar->nama !!}</td>
	    				<td>{!! $row->lama_inap !!} hari</td>
	    				<td></td>
	    				<td>Rp. {!! number_format($row->total) !!}</td>
	    				<td><a href="{{ route('transaksiKamar.destroy', $row->id) }}" onclick="event.preventDefault();getElementById('destroy{{$row->id}}').submit();">&times;</a>
	    					{!! Form::open(['route'=>['transaksiKamar.destroy', $row->id], 'method'=>'delete', 'id'=>'destroy'.$row->id]) !!}
	    					{!! Form::close() !!}
	    				</td>
	    			</tr>
	    		</tbody>
	    		@if ($loop->last)
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td align="right"><strong>Subtotal</strong></td>
	    				<td><strong>Rp. {{ number_format($transaksi->transaksiKamar->sum('total')) }}</strong></td>
	    				<td></td>
	    			</tr>
	    		@endif
	    		@endforeach

	    		@foreach ($transaksi->transaksiObat as $row)
	    		@if ($loop->first)
		    		<tr>
		    			<th>Nama Obat</th>
		    			<th>Jumlah Obat</th>
		    			<th>Harga Jual</th>
		    			<th>Total</th>
		    			<th></th>
		    		</tr>
	    		@endif
	    		<tbody>
	    			<tr>
	    				<td>{!! $row->obat->nama !!}</td>
	    				<td>{!! $row->jml_obat !!} {!! $row->obat->jenis !!}</td>
	    				<td>Rp. {!! number_format($row->obat->harga_jual) !!}</td>
	    				<td>Rp. {!! number_format($row->jml_obat * $row->obat->harga_jual) !!}</td>
	    				<td><a href="{{ route('transaksiObat.destroy', $row->id) }}" onclick="event.preventDefault();getElementById('destroy{{$row->id}}').submit();">&times;</a>
	    					{!! Form::open(['route'=>['transaksiObat.destroy', $row->id], 'method'=>'delete', 'id'=>'destroy'.$row->id]) !!}
	    					{!! Form::close() !!}
	    				</td>
	    			</tr>
	    		</tbody>
	    		@if ($loop->last)
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td align="right"><strong>Subtotal</strong></td>
	    				<td ><strong>Rp. {{ number_format($transaksi->transaksiObat->sum('total')) }}</strong></td>
	    				<td></td>
	    			</tr>
	    		@endif
	    		@endforeach
	    		<tfoot>
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td align="right"><strong>Total</strong></td>
	    				<td><strong>Rp. {{ number_format($transaksi->transaksiObat->sum('total') + $transaksi->transaksiKamar->sum('total') + $transaksi->transaksiTindakan->sum('total')) }}</strong></td>
	    				<td></td>
	    			</tr>
	    			@if ($transaksi->jenis != 'Umum')
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td align="right"><strong>Bayar DP</strong></td>
	    				<td><strong>Rp. {{ number_format($transaksi->dp) }}</strong></td>
	    				<td></td>
	    			</tr>
	    			@endif
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td align="right"><strong>Total Bayar</strong></td>
	    				<td><strong>Rp. {{ number_format($transaksi->transaksiObat->sum('total') + $transaksi->transaksiKamar->sum('total') + $transaksi->transaksiTindakan->sum('total')-$transaksi->dp) }}</strong></td>
	    				<td></td>
	    			</tr>
	    		</tfoot>
	    	</table>

	    	<a href="{{ route('pasien.show', $transaksi->pasien->id) }}" class="btn btn-primary btn-block">Finish</a>
	    </div>
	</div>
</div>
@endsection
