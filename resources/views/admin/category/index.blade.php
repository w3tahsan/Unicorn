@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
    </ol>
</div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-black">Add Category </h4>
                    {{-- <h3 class="float-end">Count: <span></span></h3> --}}
                </div>
                <div class="card-body">
                    @if (session('success_msg'))
                        <div class="alert alert-success">
                            {{ session('success_msg') }}
                        </div>
                    @endif
                    <form action="{{ url('/category/insert') }} " method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Category Name</label>

                            <input type="text" name="category_name" class="form-control">
                            @error('category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <button class="btn btn-primary btn-xs" type="submit">Add Category</button>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-black">Category List</h4>
                    {{-- <h3 class="float-end">Count: <span></span></h3> --}}
                </div>
                <div class="card-body">
                    <form action=" {{ url('/markSoft/delete') }} " method="POST">
                        @csrf
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    {{-- <label class="custom-control-label" for="checkAll"></label> --}}
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Added By</th>
                                    <th>Create at</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($all_category as $key => $category)
                                    <tr class="{{ $loop->odd ? 'text-danger' : 'text-success' }}">
                                        <td><input type="checkbox" name="mark[]" value=" {{ $category->id }} "></td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        {{-- <td>{{ $category->user_id }}</td> --}}

                                        <td>
                                            @php
                                                if (App\Models\User::where('id', $category->user_id)->exists()) {
                                                    echo $category->rel_to_user->name;
                                                } else {
                                                    echo 'N/A';
                                                }
                                            @endphp
                                        </td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>
                                            {{-- {{ route('category.delete', $category->id) }} --}}
                                            <div class="d-flex">
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                @can('del_category')
                                                <button name="{{ route('categorySoft.delete', $category->id) }}"
                                                    type="button" class="delete_btn btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></button>
                                                    @endcan
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <button type="submit" class="button btn btn-danger btn-xs">Delete</button>
                    </form>

                </div>
            </div>


        </div>



    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="font-weight-bold text-black">Trash Category List</h4>
            {{-- <h3 class="float-end">Count: <span></span></h3> --}}
        </div>
        <div class="card-body">
            <form action=" {{ url('/markAll/restore') }} " method="POST">
                @csrf
                <table class="table table-bordered">

                    <thead>
                        <tr>

                            <th> <input type="checkbox" id="checTrashkAll"></th>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Added By</th>
                            <th>Create at</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($trash_all as $key => $trash)
                            <tr class="{{ $loop->odd ? 'text-danger' : 'text-success' }}">
                                <td><input type="checkbox" name="markRestoreAll[]" class="marktrash"
                                        value=" {{ $trash->id }} "></td>

                                <td>{{ $key + 1 }}</td>
                                <td>{{ $trash->category_name }}</td>
                                {{-- <td>{{ $trash->user_id }}</td> --}}


                                <td>
                                    @php
                                        if (App\Models\User::where('id', $category->user_id)->exists()) {
                                            echo $trash->rel_to_user->name;
                                        } else {
                                            echo 'N/A';
                                        }
                                    @endphp
                                </td>
                                <td>{{ $trash->created_at->diffForHumans() }}</td>
                                <td>
                                    {{-- {{ route('category.delete', $category->id) }} --}}

                                    <a href="{{ route('category.restore', $trash->id) }}"
                                        class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-undo"></i></a>
                                    <button name="{{ route('categoryHard.delete', $trash->id) }}" type="button"
                                        class="delete_btn btn btn-danger shadow btn-xs sharp"><i
                                            class="fa fa-trash"></i></button>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <button type="submit" class="button btn btn-warning btn-xs">Restore</button>

            </form>

        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        $('#checkAll').click(function() {
            $('input[type="checkbox"]').not(this).prop('checked', this.checked)
        })
    </script>
    <script>
        $('#checTrashkAll').click(function() {
            $('.marktrash').not(this).prop('checked', this.checked)
        })
    </script>
@endsection
