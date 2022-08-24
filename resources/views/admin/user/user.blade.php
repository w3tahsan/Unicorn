@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-{{Auth::user()->hasRole('Admin')?'8':'12'}} m-auto">
            <div class="card">
                <div class="card-header">

                    <h4 class="font-weight-bold text-black">User List <span class="float-end">Total User:
                            {{ $total_user }} </span></h4>
                    {{-- <h3 class="float-end">Count: <span></span></h3> --}}

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Create at</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($all_users as $key => $user)
                                <tr class="{{ $loop->odd ? 'text-danger' : 'text-success' }}">
                                    <td>{{ $all_users->firstitem() + $key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><a href="" class="btn btn-{{ ($user->status == null?'secondary':'success') }}">{{ ($user->status == null?'deactive':'active') }}</a></td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <button name=" {{ route('user.delete', $user->id) }}" type="submit"
                                            class="delete_btn btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $all_users->links() }}
                </div>
            </div>
        </div>
        @if (Auth::user()->hasRole('Admin'))
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add User</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {


            $('.delete_btn').click(function() {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // window.location.href=link,
                        // Swal.fire(
                        //   'Deleted!',
                        //   'Your file has been deleted.',
                        //   'success'

                        // )
                        var link = $(this).attr('name')
                        // alert(link)
                        window.location.href = link




                    }


                })

            });
        });
    </script>
    @if (session('delete'))
        <script>
            Swal.fire(
                'Deleted!',
                '{{ session('delete') }}',
                'success'

            )
        </script>
    @endif
@endsection
