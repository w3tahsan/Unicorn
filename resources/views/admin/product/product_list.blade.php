@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Product List</a></li>
    </ol>
</div>

<div class="">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Product List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>After Discount</th>
                            <th>Short Desp</th>
                            <th>Long Desp</th>
                            <th>Preview</th>
                            <th width="70">Action</th>
                        </tr>
                        @foreach ($all_products as $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->after_discount}}</td>
                            <td>{{substr($product->short_desp, 0,20).'...more'}}</td>
                            <td>{{substr($product->long_desp, 0,50).'...more'}}</td>
                            <td width="100"><img class="img-fluid" src="{{asset('/uploads/product/preview')}}/{{$product->preview}}" alt=""></td>
                            <td width="100">
                                <a href="{{route('inventory', $product->id)}}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-archive"></i></a>
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-success shadow btn-xs sharp"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('product.delete', $product->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
