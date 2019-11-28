@extends('layouts.app', ['linkalkes' => 'active', 'linkalkesindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-plus"></span></button>
			<a href="{{ route('alkes.create') }}" class="btn btn-info">Add New Alkes</a>
		</div>
		<div class="panel-content">
			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>No</th>
			            		<th>Kode Alkes</th>
			            		<th>Nama Alkes</th>
			            		<th>Stock</th>
			            		<th>Harga Modal</th>
			            		<th>Harga Jual</th>
			            		<th>Order Date</th>
			            		<th></th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach ($alkes as $key => $row)
		            		<tr>
		            			<td>{!! $key+1 !!}</td>
		            			<td>{!! $row->kode_alkes !!}</td>
		            			<td>{!! $row->nama !!}</td>
		            			<td>{!! $row->ttl_alat !!} {!! $row->unit !!}</td>
		            			<td>Rp. {!! number_format($row->harga_modal) !!} </td>
		            			<td>Rp. {!! number_format($row->harga_jual) !!}</td>
		            			<td>{!! $row->order_date !!}</td>
		            			<td>
		            				<a href="{{ route('alkes.edit', $row->id) }}" title='Edit Role'><button class="btn btn-primary btn-xs">Edit</button></a>
									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['alkes.destroy', $row->id],
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