@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Edit Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{route('update.permission')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="{{$user_info->id}}">
                    </div>
                    <div class="mb-3">
                        <input type="text" readonly class="form-control" value="{{$user_info->name}}">
                    </div>
                    <div class="mb-3">
                        <p>Permission Names</p>
                        @foreach ($persmissions as $persmission)
                        <input type="checkbox" {{($user_info->hasPermissionTo($persmission->name))?"checked":''}} name="permission[]" value="{{$persmission->id}}"> {{$persmission->name}}
                        <br>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Permission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
