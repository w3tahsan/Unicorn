@extends('layouts.dashboard')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product</h3>
            </div>

            <div class="card-body">
                <form action="{{url('/product/update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Category</label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{($category->id == $product_info->category_id?'selected':'')}}>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Sub Category</label>
                                <select name="subcategory_id" class="form-control" id="subcategory">
                                    <option value="">-- Select Sub Category --</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" {{($subcategory->id == $product_info->subcategory_id?'selected':'')}}>{{$subcategory->subcategory_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control" value="{{$product_info->product_name}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Product Price</label>
                                <input type="number" name="product_price" class="form-control" value="{{$product_info->product_price}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Discount %</label>
                                <input type="number" name="discount" class="form-control" value="{{$product_info->discount}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="form-label">Short Description</label>
                                <input type="text" name="short_desp" class="form-control" value="{{$product_info->short_desp}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="" class="form-label">Long Description</label>
                                <textarea id="summernote" name="long_desp" class="form-control">{{$product_info->long_desp}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="" class="form-label">Product Preview</label>
                                <input type="file" name="preview" class="form-control">
                            </div>
                            <div class="mb-3">
                                <img width="100" src="{{asset('uploads/product/preview')}}/{{$product_info->preview}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="" class="form-label">Product Thumbnails</label>
                                <input type="file" name="thumbnail[]" multiple class="form-control">
                            </div>
                            <div class="mb-3">
                                @foreach ($all_thumbnails as $thumbnail)
                                <img width="100" src="{{asset('uploads/product/thumbnail')}}/{{$thumbnail->thumbnail}}" alt="">
                                <input type="checkbox" name="thumb_name[]" value="{{$thumbnail->thumbnail}}">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="form-group">
                                <input type="hidden" value="{{$product_info->id}}" name="product_id">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
    <script>
        $('#category').change(function (){

            var category_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/getSubcategory',
                data:{'category_id': category_id},
                success:function(data){
                    $('#subcategory').html(data);
                }
            });

        });
    </script>

@if (session('success'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session('success')}}',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection
