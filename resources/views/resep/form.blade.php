{!! Form::hidden('transaksi_id', $transaksi->id, []) !!}

<div class="form-group">
    <label>Nama Obat</label>
    {!! Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Jumlah Obat</label>
    {!! Form::number('jml', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    <label>Jenis Obat</label>
    {!! Form::text('jenis', null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Add Resep', ['class'=>'btn btn-primary btn-block']) !!}
</div>