@extends('layouts.app', ['linkusermanagement' => 'active', 'linkuser' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">User Management | <small>User</small></h1>
		</div>
		<hr>
		<div class="panel-content">
			<div class="form-group">
				<a href="{{ route('users.create') }}" class="btn btn-xs"><i class="fa fa-plus-square"></i> Add New</a>
			</div>

			<div class="table-responsive">
				<table class="table">
		            	<thead>
		            		<tr>
			            		<th>#</th>
			            		<th>Name</th>
			            		<th>Email</th>
			            		<th>Role(s)</th>
			            		<th>Actions</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		@foreach ($users as $key => $row)
		            		<tr>
		            			<td>{!! $key+1 !!}</td>
		            			<td>{!! $row->name !!}</td>
		            			<td>{!! $row->email !!}</td>
		            			<td>{{ implode(', ', $row->roles->pluck('name')->toArray()) }} </td>
		            			<td><a href="{{ route('users.show', $row->id) }}" title='View Role'><button class="btn btn-warning btn-xs">View</button></a>
		            				<a href="{{ route('users.edit', $row->id) }}" title='Edit Role'><button class="btn btn-primary btn-xs">Edit</button></a>

									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['users.destroy', $row->id],
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
