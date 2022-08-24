@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Role Manager</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Role List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($roles as $key=>$role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            @foreach ($role->getPermissionNames() as $permission)
                                {{$permission}},
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('edit.permission', $role->id)}}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3>User List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Action </th>
                    </tr>
                    @foreach ($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @forelse ($user->getRoleNames() as $role)
                                {{$role}},
                            @empty
                                Not Assigned Yet
                            @endforelse
                        </td>
                        <td>
                            @forelse ($user->getAllPermissions() as $permission)
                                {{$permission->name}},
                            @empty
                                Not Assigned Yet
                            @endforelse
                        </td>
                        <td>
                            <a href="{{route('edit.permision', $user->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('remove.role', $user->id)}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{route('add.permission')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="permission_name" class="form-control" placeholder="Permission Name">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Permission</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Add Role</h3>
            </div>
            <div class="card-body">
                <form action="{{route('add.role')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="role_name" class="form-control" placeholder="Role Name">
                    </div>
                    <div class="mb-3">
                        @foreach ($persmissions as $persmission)
                        <input type="checkbox" name="permission[]" value="{{$persmission->id}}"> {{$persmission->name}}
                        <br>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Role</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Assign Role to User</h3>
            </div>
            <div class="card-body">
                <form action="{{route('assign.role')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <select name="user_id" class="form-control">
                            <option value="">-- Select User --</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="role_id" class="form-control">
                            <option value="">-- Select Role --</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Assign Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
