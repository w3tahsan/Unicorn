@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Coupon</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Coupon List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Discount</th>
                        <th>Type</th>
                        <th>Validity</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($coupons as $key=>$coupon)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$coupon->coupon_name}}</td>
                        <td>{{$coupon->discount}}</td>
                        <td>{{$coupon->type}}</td>
                        <td>{{$coupon->validity}}</td>
                        <td><a href="" class="btn btn-danger">Del</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Coupon</h3>
            </div>
            <div class="card-body">
                <form action="{{route('coupon.insert')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Coupon Name</label>
                        <input type="text" class="form-control" name="coupon_name">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Discount Amount</label>
                        <input type="text" class="form-control" name="discount">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Select Type</label>
                        <select name="type" class="form-control">
                            <option value="">-- select type --</option>
                            <option value="percentage">Percentage</option>
                            <option value="amount">amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Discount Validity</label>
                        <input type="date" class="form-control" name="validity">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Coupon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
