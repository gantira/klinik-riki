{!! Form::hidden('kode_tindakan', \Carbon\Carbon::now(), []) !!}

<div class="form-group">
    <label>Nama Tindakan</label>
    {!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Fee Dokter</label>
    {!! Form::number('fee_dokter', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0]) !!}
</div>

<div class="form-group">
    <label>Fee Karyawan</label>
    {!! Form::number('fee_karyawan', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0]) !!}
</div>

<div class="form-group">
    <label>Harga</label>
    {!! Form::number('harga', null, ['class'=>'form-control', 'placeholder'=>'', 'required', 'min'=>0]) !!}
</div>

<div class="form-group">
    <label>Deskripsi</label>
    {!! Form::text('desc', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Kategori</label>
    <div>
        <label class="fancy-radio">
            {!! Form::radio('kategori', 'Umum', null, []) !!}
            <span><i></i>Umum</span>
        </label>
        <label class="fancy-radio">
            {!! Form::radio('kategori', 'Bersalin', null, []) !!}
            <span><i></i>Bersalin</span>
        </label>
    </div>
</div>

<div class="form-group margin-top-30">
     <button type="submit" class="btn btn-success btn-block">{{ $button }}</button>
</div>
