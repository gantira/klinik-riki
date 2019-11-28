{!! Form::hidden('transaksi_id', null, []) !!}
{!! Form::hidden('kode_obat', \Illuminate\Support\Carbon::now(), []) !!}

<div class="form-group">
    <label>Nama Obat</label>
    {!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Jenis</label>
            {!! Form::select('jenis', ['Tablet'=>'Tablet', 'Botol'=>'Botol'], null, ['class'=>'form-control', 'id'=>'jenis']) !!}
        </div>
        <div class="col-md-3">
            <label id="label">Banyak Obat</label>
            {!! Form::number('mili_botol', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
        </div>
        <div class="col-md-3">
            <label>&nbsp;</label>
            {!! Form::text('satuan', 'tablet', ['class'=>'form-control', 'id'=>'satuan', 'readonly']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <label>Unit</label>
    {!! Form::select('unit', ['Box'=>'Box', 'Dus'=>'Dus'], null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label>Jumlah Unit</label>
    {!! Form::number('jml_unit', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0, 'onkeyup'=>'total()', 'id'=>'jml_unit']) !!}
</div>

<div class="form-group">
    <label>Jumlah Obat Per Unit</label>
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
    <label>Tgl Beli</label>
    <div class="input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('order_date', null, ['class'=>'form-control form_datetime', 'placeholder'=>'', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label>Tgl Expire</label>
    <div class="input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('expired_date', null, ['class'=>'form-control form_datetime', 'placeholder'=>'', 'required']) !!}
    </div>
</div>

<div class="form-group margin-top-30">
     <button type="submit" class="btn btn-success btn-block">{{ $button }}</button>
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

        $('#jenis').on('change', function () {
            if ($('#jenis').val() == 'Tablet') {
                document.getElementById('label').innerHTML = "Banyak Obat";
                document.getElementById('satuan').value = "tablet";
            } else {
                document.getElementById('label').innerHTML = "Miligram";
                document.getElementById('satuan').value = "miligram";
            }
        });

    </script>
@endpush
