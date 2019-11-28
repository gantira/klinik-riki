@extends('layouts.app', ['linkdata' => 'active', 'linkbidan' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Bidan</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-plus"></span></button>
			<a href="{{ route('bidan.create') }}" class="btn btn-info">Add New Bidan</a>
		</div>
		<div class="panel-content">
			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>No</th>
			            		<th>ID Bidan</th>
			            		<th>Nama Bidan</th>
			            		<th>Tanggal Lahir</th>
			            		<th>Telepon</th>
			            		<th>UD/UM</th>
			            		<th></th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach ($bidan as $key => $row)
		            		<tr>
		            			<td>{!! $key+1 !!}</td>
		            			<td>{!! $row->bidan->kode_bidan !!}</td>
		            			<td>{!! $row->name !!}</td>
		            			<td>{!! $row->bidan->birthdate !!}</td>
		            			<td>{!! $row->bidan->phone !!}</td>
		            			<td>Rp. {!! number_format($row->bidan->ud_um) !!}</td>
		            			<td>
		            				<a href="{{ route('bidan.edit', $row->id) }}" title='Edit Role'><button class="btn btn-primary btn-xs">Edit</button></a>

									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['bidan.destroy', $row->id],
			                            'style' => 'display:inline'
			                        	]) !!}
			                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
			                                    'type' => 'submit',
			                                    'class' => 'btn btn-danger btn-xs',
			                                    'title' => 'Delete Role',
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
