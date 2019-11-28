@extends('layouts.app', ['linkusermanagement' => 'active', 'linkuser' => 'active'])

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="section-heading">
            <h1 class="page-title">User Management | <small>User</small></h1>
        </div>
        <hr>
        <div class="panel-content">
            <a href="{{ route('users.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ route('users.edit', $user->id) }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
            {!! Form::open([
                'method'=>'DELETE',
                'route' => ['users.destroy', $user->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete user',
                        'onclick'=>'return confirm("Confirm delete?")'
                ))!!}
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <t><th width="20%">ID</th><td>{{ $user->id }}</td></tr>
                        <tr><th> Name </th><td> {{ $user->name }} </td></tr>
                        <tr><th> Jenis Kelamin </th><td> {{ $user->jk }} </td></tr>
                        <tr><th> Role </th><td> {{ implode(', ', $user->roles->pluck('name')->toArray()) }} </td></tr>

                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
