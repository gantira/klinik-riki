@extends('layouts.app', ['linkobat' => 'active', 'linkaddstockobat' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Obat</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
			<button type="button" class="btn btn-default">Add New Obat</button>
		</div>
		<div class="panel-content">
	        {!! Form::open(['route' => 'storeaddstockobat', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}

		        <div class="form-group">
				    <label>Nama Obat</label>
				    {!! Form::select('obat_id', $obat, null, ['class'=>'form-control', 'required']) !!}
				</div>

				<div class="form-group">
				    <label>Jumlah Unit</label>
				    {!! Form::number('jml_unit', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0, 'onkeyup'=>'total()', 'id'=>'jml_unit']) !!}
				</div>

				<div class="form-group">
				    <label>Tambah Stok Obat</label>
				    {!! Form::number('jml_perunit', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0, 'onkeyup'=>'total()', 'id'=>'jml_perunit']) !!}
				</div>

				<div class="form-group">
				    <label>Total Unit</label>
				    {!! Form::number('ttl_obat', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0, 'readonly', 'id'=>'ttl_obat']) !!}
				</div>

				<div class="form-group">
				    <label>Harga Beli/Unit (Rp.)</label>
				    {!! Form::number('harga_perunit', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0, 'onkeyup'=>'harga()', 'id'=>'harga_perunit']) !!}
				</div>

				<div class="form-group">
				    <label>Harga Modal (Rp.)</label>
				    {!! Form::number('harga_modal', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0, 'onkeyup'=>'harga()', 'readonly', 'id'=>'harga_modal']) !!}
				</div>

				<div class="form-group">
				    <label>Harga Jual</label>
				    {!! Form::number('harga_jual', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0]) !!}
				</div>

				<div class="form-group">
				    <label>Deskripsi</label>
				    {!! Form::text('desc', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
				</div>

				<div class="form-group">
				    <label>Tanggal Kadaluarsa</label>
				    <div class="input-group date">
				        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				        {!! Form::text('order_date', null, ['class'=>'form-control form_datetime', 'placeholder'=>'', 'required']) !!}
				    </div>
				</div>

				<div class="form-group margin-top-30">
				     <button type="submit" class="btn btn-success btn-block">Add Stock Obat</button>
				</div>

				@push('style')
				    <link rel="stylesheet" href="{{ asset('diffdash/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
				@endpush
				@push('scripts')
				    <script src="{{ asset('diffdash/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
				    <script type="text/javascript">
				        $(".form_datetime").datepicker({format: 'yyyy-mm-dd'});

				        function total() {
				            var jml_unit = $('#jml_unit' ).val();
				            var jml_perunit = $('#jml_perunit' ).val();

				            document.getElementById('ttl_obat').value = jml_unit * jml_perunit;
				        }
				        function harga() {
				            var harga_perunit = $('#harga_perunit' ).val();
				            var jml_perunit = $('#jml_perunit' ).val();

				            document.getElementById('harga_modal').value = harga_perunit / jml_perunit;
				        }
				    </script>
				@endpush


	        {!! Form::close() !!}
	    </div>
	    
	</div>
</div>
@endsection

