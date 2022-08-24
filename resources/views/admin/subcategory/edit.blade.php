@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Subcategory Edit</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Add Sub category</h3>
            </div>
            <div class="card-body">
                <form action="{{url('/subcategory/update')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Select Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{($category->id == $subcategories_info->category_id?'selected':'')}}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <strong class="text-danger mt-2">{{$message}}</strong>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Subcategory Name</label>
                        <input type="hidden" class="form-control" name="subcategory_id" value="{{$subcategories_info->id}}">
                        <input type="text" class="form-control" name="subcategory_name" value="{{$subcategories_info->subcategory_name}}">
                        @error('subcategory_name')
                            <strong class="text-danger mt-2">{{$message}}</strong>
                        @enderror
                        @if(session('exist'))
                            <strong class="text-danger mt-2">{{session('exist')}}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Subcategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
