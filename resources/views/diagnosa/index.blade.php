@extends('layouts.app', ['linkdiagnosa' => 'active', 'linkdiagnosaindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Diagnosa</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-plus"></span></button>
			<a href="{{ route('diagnosa.create') }}" class="btn btn-info">Add New Diagnosa</a>
		</div>
		<div class="panel-content">
			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>No</th>
			            		<th>Nama Diagnosa</th>
			            		<th>Deskripsi</th>
			            		<th>Kategori</th>
			            		<th></th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach ($diagnosa as $key => $row)
		            		<tr>
		            			<td>{!! $key+1 !!}</td>
		            			<td>{!! $row->nama !!}</td>
		            			<td>{!! $row->desc !!}</td>
		            			<td>{!! $row->kategori !!}</td>
		            			<td>
		            				{{-- <a href="{{ route('diagnosa.show', $row->id) }}" title='View Role'><button class="btn btn-warning btn-xs">View</button></a> --}}
		            				<a href="{{ route('diagnosa.edit', $row->id) }}" title='Edit Diagnosa'><button class="btn btn-primary btn-xs">Edit</button></a>

									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['diagnosa.destroy', $row->id],
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
