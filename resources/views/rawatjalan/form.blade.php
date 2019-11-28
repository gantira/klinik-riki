<div class="form-group">
    <label>Dokter</label>
    {!! Form::select('user_id', $dokter, $rawatjalan->user_id, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label>Diagnosa</label>
    {!! Form::select('diagnosa_id', $diagnosa, $rawatjalan->diagnosa_id, ['class'=>'form-control', 'placeholder'=>'']) !!}
</div>

<div class="form-group margin-top-30">
     <button type="submit" class="btn btn-success btn-block">{{ $button }}</button>
</div>

