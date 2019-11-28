@extends('layouts.app', ['linkpasien' => 'active', 'linkpasienindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Pasien</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-plus"></span></button>
			<a href="{{ route('pasien.create') }}" class="btn btn-info">Add New Pasien</a>
			<a href="{{ route('rekamedis.index') }}" class="btn btn-warning">Rekamedis Pasien</a>
		</div>
		<div class="panel-content">
			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>No</th>
			            		<th>ID Pasien</th>
			            		<th>Nama Pasien</th>
			            		<th>Umur</th>
			            		<th>Jenis Kelamin</th>
			            		<th>Telepon</th>
			            		<th></th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach ($pasien as $key => $row)
		            		<tr>
		            			<td>{!! $key+1 !!}</td>
		            			<td>{!! $row->kode_pasien !!}</td>
		            			<td>{!! $row->nama !!}</td>
		            			<td>{!! $row->umur !!} tahun</td>
		            			<td>{!! $row->jk !!}</td>
		            			<td>{!! $row->phone !!}</td>
		            			<td>
		            				{{-- <a href="{{ route('pasien.show', $row->id) }}" title='View Pasien'><button class="btn btn-warning btn-xs">View</button></a> --}}
		            				<a href="{{ route('kartupasien', $row->id) }}" title='View'><button class="btn btn-warning btn-xs">Kartu Pasien</button></a>
		            				<a href="{{ route('pasien.show', $row->id) }}" title='View'><button class="btn btn-success btn-xs">View</button></a>
		            				<a href="{{ route('pasien.edit', $row->id) }}" title='Edit Pasien'><button class="btn btn-primary btn-xs">Edit</button></a>

									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['pasien.destroy', $row->id],
			                            'style' => 'display:inline'
			                        	]) !!}
			                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
			                                    'type' => 'submit',
			                                    'class' => 'btn btn-danger btn-xs',
			                                    'title' => 'Delete Pasien',
			                                    'onclick'=>'return confirm("Confirm delete?")'
			                            )) !!}
			                        {!! Form::close() !!}
				          		</td>
		            		</tr>
		            		@endforeach
		            	</tbody>
		            </table>
			</div>
		</div>

	</div>
</div>
@endsection
