@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">inventory</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Inventory Info</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($inventories as $key=>$inventory)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$inventory->rel_to_product->product_name}}</td>
                        <td>{{$inventory->rel_to_color->color_name}}</td>
                        <td>{{$inventory->rel_to_size->size_name}}</td>
                        <td>{{$inventory->quantity}}</td>
                        <td>
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
                <h3>Add Inventory</h3>
            </div>
            <div class="card-body">
                <form action="{{url('/inventory/insert')}}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <input type="hidden" name="product_id" class="form-control" value="{{$product_info->id}}">
                        <input type="text" readonly class="form-control" value="{{$product_info->product_name}}">
                    </div>
                    <div class="mt-3">
                        <select name="color_id"  class="form-control">
                            <option value="">-- Select Color --</option>
                            @foreach ($colors as $color)
                                <option value="{{$color->id}}">{{$color->color_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <select name="size_id"  class="form-control">
                            <option value="">-- Select Size --</option>
                            @foreach ($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <input type="text" class="form-control" name="quantity" placeholer="Quantity">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Inventory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
