@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User Roles</div>
                <div class="card-body">
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table id="datatable" class="table table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('user-roles.assignRoles') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="email" value="{{ $user->email }}">
                                            <div class="d-flex justify-content-around">
                                                <label for="User">User</label>
                                                <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }}
                                                    name="role_user">
                                                <label for="Admin">Admin</label>
                                                <input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }}
                                                    name="role_admin">
                                                <button type="submit" class="btn btn-success btn-sm">Assign
                                                    Roles</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection