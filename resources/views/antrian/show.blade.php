@extends('layouts.app', ['linkantrian' => 'active', 'linkantriancreate' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Pasien {{ $pendaftaran->jenis }}</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-chevron-left"></span></button>
			<button type="button" class="btn btn-info" onclick="javascript:history.go(-1)">Back</button>
		</div>
		<div class="panel-content">
            <table class="table">
                <tr>
                    <td width="20%"><strong>Nama Pasien</strong></td>
                    <td>{{ $pendaftaran->pasien->nama }}</td>
                </tr>
                <tr>
                    <td><strong>ID Pasien</strong></td>
                    <td>{{ $pendaftaran->pasien->kode_pasien }}</td>
                </tr>
                <tr>
                    <td><strong>Umur</strong></td>
                    <td>{{ $pendaftaran->pasien->umur }} tahun</td>
                </tr>
                <tr>
                    <td><strong>Jenis Kelamin</strong></td>
                    <td>{{ $pendaftaran->pasien->jk }}</td>
                </tr>
                <tr>
                    <td><strong>Phone</strong></td>
                    <td>{{ $pendaftaran->pasien->phone }}</td>
                </tr>
                <tr>
                    <td><strong>Penanggung Jawab</strong></td>
                    <td>{{ $pendaftaran->pasien->peng_jawab }}</td>
                </tr>
                <tr>
                    <td><strong>Keterangan</strong></td>
                    <td>{{ $pendaftaran->keterangan }}</td>
                </tr>
            </table>

            {!! Form::open(['route'=>'antrian.store', 'method'=>'post']) !!}

                {!! Form::hidden('kode_transaksi', \Carbon\Carbon::now(), []) !!}
                {!! Form::hidden('pasien_id', $pendaftaran->pasien->id, []) !!}
                {!! Form::hidden('pendaftaran', $pendaftaran->id, []) !!}
                {!! Form::hidden('jenis', $pendaftaran->jenis, []) !!}
                            
                <div class="form-group">
                    <label>Dokter</label>
                    {!! Form::select('user_id', $dokter, null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                </div>

                <div class="form-group">
                    <label>Diagnosa</label>
                    {!! Form::select('diagnosa_id', $diagnosa, null, ['class'=>'form-control', 'placeholder'=>'', 'required']) !!}
                </div>

                @if ($pendaftaran->jenis != 'Umum')
                <div class="form-group">
                    <label>Bayar DP</label>
                    {!! Form::number('dp', null, ['class'=>'form-control']) !!}
                </div>
                @endif

                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-success btn-block']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

