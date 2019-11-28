@extends('layouts.app', ['linkantrian' => 'active', 'linkantriancreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Pasien Umum | {{ $pasien->nama }}</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
		</div>
		<div class="panel-content">
            {!! Form::open(['route'=>'antrian.store', 'method'=>'post']) !!}
            
            <div class="form-group">
                <label>Racikan</label>
                {!! Form::select('tindakan_id', $tindakan, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label>Diagnosa</label>
                {!! Form::select('diagnosa_id', $diagnosa, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-success btn-block']) !!}
            </div>

            {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection

