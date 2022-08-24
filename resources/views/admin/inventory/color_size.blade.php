@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Color n Size</a></li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Color list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Color Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($colors as $key=>$color)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><span style="padding:10px 20px; color:tomato; background-color:#{{$color->color_code}}">{{$color->color_name}}</span></td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Size list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Size Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($sizes as $key=>$size)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$size->size_name}}</td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
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
                    <h3>Add color</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/insert/color')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Color Name</label>
                            <input type="text" name="color_name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Color Code</label>
                            <input type="text" name="color_code" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Add color</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Add Size</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/insert/size')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Size Name</label>
                            <input type="text" name="size_name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Add Size</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
