{!! Form::hidden('kode_bidan', \Carbon\Carbon::now(), []) !!}
{!! Form::hidden('roles', 'bidan', []) !!}

<div class="form-group">
    <label>Bidan Name</label>
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
    <label>Join Date</label>
    <div class="input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('join_date', isset($bidan->bidan->join_date) ? $bidan->bidan->join_date : null, ['class'=>'form-control form_datetime', 'placeholder'=>'', 'required']) !!}
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
    {!! Form::number('ud_um', isset($bidan->bidan->ud_um) ? $bidan->bidan->ud_um : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Birthdate</label>
    <div class="input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!! Form::text('birthdate', isset($bidan->bidan->birthdate) ? $bidan->bidan->birthdate : null, ['class'=>'form-control form_datetime', 'placeholder'=>'', 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label>Phone</label>
    {!! Form::text('phone', isset($bidan->bidan->phone) ? $bidan->bidan->phone : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Alamat</label>
    {!! Form::text('alamat', isset($bidan->bidan->alamat) ? $bidan->bidan->alamat : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kecamatan</label>
    {!! Form::text('kecamatan', isset($bidan->bidan->kecamatan) ? $bidan->bidan->kecamatan : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kota</label>
    {!! Form::text('kota', isset($bidan->bidan->kota) ? $bidan->bidan->kota : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kode Pos</label>
    {!! Form::text('kode_pos', isset($bidan->bidan->kode_pos) ? $bidan->bidan->kode_pos : null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
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
