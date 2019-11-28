@extends('layouts.app', ['linkusermanagement' => 'active', 'linkrole' => 'active'])

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="section-heading">
            <h1 class="page-title">User Management | <small>Role</small></h1>
        </div>
        <hr>
        <div class="panel-content">
            <a href="{{ route('roles.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ route('roles.edit', $role->id) }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
            {!! Form::open([
                'method'=>'DELETE',
                'route' => ['roles.destroy', $role->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete Role',
                        'onclick'=>'return confirm("Confirm delete?")'
                ))!!}
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $role->id }}</td>
                        </tr>
                        <tr><th> Name </th><td> {{ $role->name }} </td></tr>
                        <tr><th> Permissions </th><td> {{ implode(', ', $role->permissions->pluck('name')->toArray()) }} </td></tr>

                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
