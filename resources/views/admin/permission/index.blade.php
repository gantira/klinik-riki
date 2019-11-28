@extends('layouts.app', ['linkusermanagement' => 'active', 'linkpermission' => 'active'])

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<div class="section-heading">
			<h1 class="page-title">User Management | <small>Permission</small></h1>
		</div>
		<hr>
		<div class="panel-content">
			<div class="form-group">
				<a href="{{ route('permissions.create') }}" class="btn btn-xs"><i class="fa fa-plus-square"></i> Add New</a>
			</div>

			<div class="table-responsive">
				<table class="table no-margin">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($permissions as $key => $row)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $row->name }}</td>
							<td><a href="{{ route('permissions.show', $row->id) }}" title="View Permission" class="btn btn-warning btn-xs">View</a>
		            				<a href="{{ route('permissions.edit', $row->id) }}" title="Edit Permission" class="btn btn-primary btn-xs"></i>Edit</a>

									{!! Form::open([
			                            'method'=> 'DELETE',
			                            'route' => ['permissions.destroy', $row->id],
			                            'style' => 'display:inline'
			                        	]) !!}
			                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
			                                    'type' => 'submit',
			                                    'class' => 'btn btn-danger btn-xs',
			                                    'title' => 'Delete Permission',
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
