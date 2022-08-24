
@extends('frontend.master')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 m-auto my-5">
            <div class="card">
                <div class="card-header">
                    <p>Order Confirmation Message</p>
                </div>
                <div class="card-body">
                    @if (session('order_success'))
                        <div class="alert alert-success">
                            {{session('order_success')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

