{!! Form::hidden('kode_kamar', \Carbon\Carbon::now(), []) !!}

<div class="form-group">
    <label>Nama Kamar</label>
    {!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Jumlah Kamar</label>
    {!! Form::text('jml_kamar', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Harga</label>
    {!! Form::text('harga', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>


<div class="form-group margin-top-30">
     <button type="submit" class="btn btn-success btn-block">{{ $button }}</button>
</div>
