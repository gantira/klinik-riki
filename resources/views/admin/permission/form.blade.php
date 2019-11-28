<div class="form-group">
  	<label class="col-sm-2 control-label">Nama</label>
  	<div class="col-sm-5">
  		{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nama Permission', 'required']) !!}
  	</div>
</div>

<div class="form-group">
  	<div class="col-sm-offset-2 col-sm-10">
  		<button type="submit" class="btn btn-default">{{ $button or 'Submit'}}</button>
  	</div>
</div>