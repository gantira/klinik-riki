@extends('layouts.app', ['linkobat' => 'active', 'linkobatindex' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">Obat</h1>
			<hr>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default"><span class="fa fa-plus"></span></button>
			<a href="{{ route('obat.create') }}" class="btn btn-info">Add New Obat</a>
		</div>
		<div class="panel-content">
			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>No</th>
			            		<th>Kode Obat</th>
			            		<th>Nama Obat</th>
			            		<th>Stok</th>
			            		<th>Harga Modal</th>
			            		<th>Harga Jual</th>
			            		<th>Tanggal Pesan</th>
			            		<th>Tanggal Kadaluarsa</th>
			            		<th></th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach ($obat as $key => $row)
		            		<tr>
		            			<td>{!! $key+1 !!}</td>
		            			<td>{!! $row->kode_obat !!}</td>
		            			<td>{!! $row->nama !!}</td>
		            			<td>{!! $row->ttl_obat !!} {!! $row->jenis !!}</td>
		            			<td>Rp. {!! number_format($row->harga_modal) !!} </td>
		            			<td>Rp. {!! number_format($row->harga_jual) !!}</td>
		            			<td>{!! $row->order_date !!}</td>
		            			<td>{!! $row->expired_date !!}</td>
		            			<td>
		            				{{-- <a href="{{ route('obat.show', $row->id) }}" title='View Role'><button class="btn btn-warning btn-xs">View</button></a> --}}
		            				<a href="{{ route('obat.edit', $row->id) }}" title='Edit Role'><button class="btn btn-primary btn-xs">Edit</button></a>

									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['obat.destroy', $row->id],
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
