@extends('layouts.app', ['linktindakan' => 'active', 'linktindakanindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Rawat Jalan</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-plus"></span></button>
			<a href="{{ route('tindakan.create') }}" class="btn btn-info">Add New Tindakan</a>
		</div>
		<div class="panel-content">
			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>No</th>
			            		<th>Nama Tindakan</th>
			            		<th>Fee Dokter</th>
			            		<th>Fee Karyawan</th>
			            		<th>Harga</th>
			            		<th>Desc</th>
			            		<th></th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach ($tindakan as $key => $row)
		            		<tr>
		            			<td>{!! $key+1 !!}</td>
		            			<td>{!! $row->nama !!}</td>
		            			<td>Rp. {!! number_format($row->fee_dokter) !!}</td>
		            			<td>Rp. {!! number_format($row->fee_karyawan) !!}</td>
		            			<td>Rp. {!! number_format($row->harga) !!}</td>
		            			<td>{!! $row->desc !!}</td>
		            			<td>
		            				<a href="{{ route('tindakan.edit', $row->id) }}" title='Edit Role'><button class="btn btn-primary btn-xs">Edit</button></a>
									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['tindakan.destroy', $row->id],
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
