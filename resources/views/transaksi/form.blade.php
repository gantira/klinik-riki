<div class="form-group">
    <label>Penanggung Jawab</label>
    {!! Form::text('', auth()->user()->name, ['class'=>'form-control', 'readonly']) !!}
</div>

@if ($transaksi->jenis == 'Umum')
<div class="form-group">
    <label>Diagnosa</label>
    {!! Form::select('diagnosa_id', $diagnosa, $transaksi->diagnosa_id, ['class'=>'form-control', 'placeholder'=>'']) !!}
</div>

<div class="form-group">
    <label>Tambahan Diagnosa</label>
    {!! Form::text('tambahan_diagnosa', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group margin-top-30">
     <button type="submit" class="btn btn-success btn-block">{{ $button }}</button>
</div>

@endif

