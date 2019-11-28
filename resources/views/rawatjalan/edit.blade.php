@extends('layouts.app', ['linkrawatjalan' => 'active', 'linkrawatjalanindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="btn-group">
			<a href="{{ route('rawatjalan.index') }}" class="btn btn-default"> <span class="fa fa-home"></span></a>
		</div>
		<div class="panel-content">
	        {!! Form::model($rawatjalan, ['route' => ['rawatjalan.update', $rawatjalan->id], 'method'=>'patch', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        @include('rawatjalan.form', ['button'=>'Update'])

	        {!! Form::close() !!}
	    </div>
	    {!! Form::open(['route'=>'rawatjalandetail.store', 'class'=>'form-horizontal']) !!}
 			{!! Form::hidden('rawat_jalan_id', $rawatjalan->id, []) !!}
	    	<div class="form-group">
	    		<div class="col-sm-4">
	        		{!! Form::select('obat_id', $obat, null, ['class'=>'form-control', 'placeholder'=>'Pilih obat', 'required']) !!}
	    		</div>
	    		<div class="col-sm-2">
	    			{!! Form::number('jml_obat', null, ['class'=>'form-control', 'min'=>1, 'placeholder'=>'Jumlah obat', 'required']) !!}
	    		</div>
	    		<div class="col-sm-4">
	    			{!! Form::submit('Add Obat', ['class'=>'btn btn-primary btn-sm']) !!}
	    		</div>
	    	</div>

    	{!! Form::close() !!}

	    <div class="table-responsive">
	    	<table class="table table-striped">
	    		<thead>
		    		<tr>
		    			<th>Nama Obat</th>
		    			<th>Jumlah Obat</th>
		    			<th>Harga Jual</th>
		    			<th>Total</th>
		    			<th></th>
		    		</tr>
	    		</thead>
	    		@foreach ($rawatjalan->rawatjalandetail as $row)
	    		<tbody>
	    			<tr>
	    				<td>{!! $row->obat->nama !!}</td>
	    				<td>{!! $row->jml_obat !!}</td>
	    				<td>Rp. {!! number_format($row->obat->harga_jual) !!}</td>
	    				<td>Rp. {!! number_format($row->jml_obat * $row->obat->harga_jual) !!}</td>
	    				<td><a href="{{ route('rawatjalandetail.destroy', $row->id) }}" onclick="event.preventDefault();getElementById('destroy{{$row->id}}').submit();">&times;</a>
	    					{!! Form::open(['route'=>['rawatjalandetail.destroy', $row->id], 'method'=>'delete', 'id'=>'destroy'.$row->id]) !!}
	    					{!! Form::close() !!}

	    				</td>
	    			</tr>
	    		</tbody>
	    		@endforeach
	    		<tfoot>
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td><strong>TOTAL</strong></td>
	    				<td><strong>Rp. {{ number_format($rawatjalan->rawatjalandetail->sum('total')) }}</strong></td>
	    				<td></td>
	    			</tr>
	    		</tfoot>
	    	</table>

	    	<a href="{{ route('pasien.show', $rawatjalan->pasien->id) }}" class="btn btn-primary btn-block">Finish</a>
	    </div>
	</div>
</div>
@endsection
