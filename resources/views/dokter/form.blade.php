{!! Form::hidden('kode_dokter', \Carbon\Carbon::now(), []) !!}
{!! Form::hidden('roles', 'dokter', []) !!}

<div class="form-group">
    <label>Doctor Name</label>
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Email</label>
    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Password</label>
    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Tanggal Masuk</label>
    <div class="input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('join_date', isset($dokter->dokter->join_date) ? $dokter->dokter->join_date : null, ['class'=>'form-control form_datetime', 'placeholder'=>'', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label>Jenis Kelamin</label>
    <div>
        <label class="fancy-radio">
            {!! Form::radio('jk', 'Laki-Laki', null, []) !!}
            <span><i></i>Laki-Laki</span>
        </label>
        <label class="fancy-radio">
            {!! Form::radio('jk', 'Perempuan', null, []) !!}
            <span><i></i>Perempuan</span>
        </label>
    </div>
</div>

<div class="form-group">
    <label>UD + UM 24 Jam</label>
    {!! Form::number('ud_um', isset($dokter->dokter->ud_um) ? $dokter->dokter->ud_um : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Spesialisasi</label>
    <div>
        <label class="fancy-radio">
            {!! Form::radio('spesialisasi', 'Umum', isset($dokter) ? $dokter->dokter->spesialisasi : null, []) !!}
            <span><i></i>Umum</span>
        </label>
        <label class="fancy-radio">
            {!! Form::radio('spesialisasi', 'Bersalin', isset($dokter) ? $dokter->dokter->spesialisasi : null, []) !!}
            <span><i></i>Bersalin</span>
        </label>
    </div>
</div>

<div class="form-group">
    <label>Tanggal Lahir</label>
    <div class="input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('birthdate', isset($dokter->dokter->birthdate) ? $dokter->dokter->birthdate : null, ['class'=>'form-control form_datetime', 'placeholder'=>'', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label>Telepon</label>
    {!! Form::text('phone', isset($dokter->dokter->phone) ? $dokter->dokter->phone : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Alamat</label>
    {!! Form::text('alamat', isset($dokter->dokter->alamat) ? $dokter->dokter->alamat : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kecamatan</label>
    {!! Form::text('kecamatan', isset($dokter->dokter->kecamatan) ? $dokter->dokter->kecamatan : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kota</label>
    {!! Form::text('kota', isset($dokter->dokter->kota) ? $dokter->dokter->kota : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kode Pos</label>
    {!! Form::text('kode_pos', isset($dokter->dokter->kode_pos) ? $dokter->dokter->kode_pos : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
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
    </script>
@endpush
