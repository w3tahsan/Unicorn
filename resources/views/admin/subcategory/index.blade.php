@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Subcategory</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Subcategory List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($subcategories as $key=>$subcategory)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            @php
                                if(App\Models\Category::where('id', $subcategory->category_id)->exists()){
                                    echo $subcategory->rel_to_category->category_name;
                                }
                                else{
                                    echo 'Uncategorize';
                                }
                            @endphp
                        </td>
                        <td>{{$subcategory->subcategory_name}}</td>
                        <td>{{$subcategory->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('edit.subcategory', $subcategory->id)}}" class="btn btn-primary shadow btn-xs sharp"><i class="fa fa-pencil"></i></a>
                            <a href="" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                <h3>Add Sub category</h3>
            </div>
            <div class="card-body">
                <form action="{{url('/subcategory/insert')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Select Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <strong class="text-danger mt-2">{{$message}}</strong>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Subcategory Name</label>
                        <input type="text" class="form-control" name="subcategory_name">
                        @error('subcategory_name')
                            <strong class="text-danger mt-2">{{$message}}</strong>
                        @enderror
                        @if(session('exist'))
                            <strong class="text-danger mt-2">{{session('exist')}}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Subcategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
