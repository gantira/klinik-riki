{!! Form::hidden('kode_pasien', \Carbon\Carbon::now(), []) !!}

<div class="form-group">
    <label>Nama Pasien</label>
    {!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Tanggal Lahir</label>
    {!! Form::date('tgl_lahir', \Illuminate\Support\Carbon::now()->addYear(-20), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label>Umur</label>
    {!! Form::text('umur', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
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
    <label>Tlp / HandPhone</label>
    {!! Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kecamatan</label>
    {!! Form::text('kelurahan', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kota</label>
    {!! Form::text('kota', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Penanggung Jawab</label>
    {!! Form::text('peng_jawab', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Status</label>
    {!! Form::text('status', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group margin-top-30">
     <button type="submit" class="btn btn-success btn-block">{{ $button }}</button>
</div>