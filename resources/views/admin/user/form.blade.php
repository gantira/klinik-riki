<div class="form-group">
    <label class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-5">
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nama User', 'required']) !!}
    </div>
</div>  

<div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-5">
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email User', 'required']) !!}
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>   

<div class="form-group">
    <label class="col-sm-2 control-label">Jenis Kelamin</label>
    <div class="col-sm-5">
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
    <label class="col-sm-2 control-label">Foto Profile</label>
    <div class="col-sm-5">
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>
</div>   

<div class="form-group">
    <label class="col-sm-2 control-label">Role</label>
    <div class="col-sm-5">
        {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('name','name') : null, ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>      

<div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-5">
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>   

<div class="form-group">
    <label class="col-sm-2 control-label">Password Confirmation</label>
    <div class="col-sm-5">
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div> 

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">{{ $button or 'Submit'}}</button>
    </div>
</div>

{{ $errors }}