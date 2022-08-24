<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.index', [
            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ]);
    }

    function view(){
        $all_products = Product::all();
        return view('admin.product.product_list', [
            'all_products'=>$all_products,
        ]);
    }

    function getSubcategory(Request $request){
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        $str = '<option value="">-- Select Sub Category --</option>';
        foreach($subcategories as $subcategory){
            $str .= '<option value="'.$subcategory->id.'">'.$subcategory->subcategory_name.'</option>';
        }
        echo $str;
    }

    function insert(Request $request){
        $product_id = Product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'discount'=>$request->discount,
            'after_discount'=>$request->product_price - ($request->product_price*$request->discount)/100,
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp,
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_file = $request->preview;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = $product_id.'.'.$extension;

        Image::make($uploaded_file)->resize(680,680)->save(public_path('/uploads/product/preview/'.$file_name));

        Product::find($product_id)->update([
            'preview'=>$file_name,
        ]);
        $loop = 1;
        $thumbnails_images = $request->thumbnail;
        foreach($thumbnails_images as $thumb){
            $thumbnail_extension = $thumb->getClientOriginalExtension();
            $thumb_file_name = $product_id.'-'.$loop.'.'.$thumbnail_extension;
            Image::make($thumb)->resize(680,680)->save(public_path('/uploads/product/thumbnail/'.$thumb_file_name));

            Thumbnail::insert([
                'product_id'=>$product_id,
                'thumbnail'=>$thumb_file_name,
                'created_at'=>Carbon::now(),
            ]);

            $loop++;
        }
        return back()->with('success', 'Product Added Successfully!');
    }


    function delete($product_id){
        $product_image = Product::find($product_id);
        $delete_from = public_path('/uploads/product/preview/'.$product_image->preview);
        unlink($delete_from);

        Product::find($product_id)->delete();
        return back();

    }

    function product_edit($product_id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $product_info = Product::find($product_id);
        $all_thumbnails = Thumbnail::where('product_id', $product_id)->get();
        return view('admin.product.edit', [
            'categories'=>$categories,
            'product_info'=>$product_info,
            'subcategories'=>$subcategories,
            'all_thumbnails'=>$all_thumbnails,
        ]);
    }

    function product_update(Request $request){

        foreach($request->thumb_name as $thumb_name){
            $delete_from = public_path('/uploads/product/thumbnail/'.$thumb_name);
            unlink($delete_from);
        }
        $thumbnails_images = $request->thumbnail;
        foreach($thumbnails_images as $thumb){
            foreach($request->thumb_name as $thumb_name){
                $thumbnail_extension = $thumb->getClientOriginalExtension();
                $abc = explode('.', $thumb_name);
                $thumb_file_name = $abc[0].'.'.$thumbnail_extension;
                Image::make($thumb)->resize(680,680)->save(public_path('/uploads/product/thumbnail/'.$thumb_file_name));
                Thumbnail::where('thumbnail', $thumb_name)->update([
                    'thumbnail'=>$thumb_file_name,
                ]);
            }
        }
        return back();



        // $thumbnails_images = $request->thumbnail;
        // if($thumbnails_images != ''){
        //     $prev_img = Thumbnail::where('product_id', $request->product_id)->get();

        //     foreach($prev_img as $thum){
        //         $delete_from = public_path('/uploads/product/thumbnail/'.$thum->thumbnail);
        //         unlink($delete_from);
        //     }
        //     Thumbnail::where('product_id', $request->product_id)->delete();
        //     $loop = 1;
        //     foreach($thumbnails_images as $thumb){
        //     $thumbnail_extension = $thumb->getClientOriginalExtension();
        //     $thumb_file_name = $request->product_id.'-'.$loop.'.'.$thumbnail_extension;
        //     Image::make($thumb)->resize(680,680)->save(public_path('/uploads/product/thumbnail/'.$thumb_file_name));

        //     Thumbnail::insert([
        //         'product_id'=>$request->product_id,
        //         'thumbnail'=>$thumb_file_name,
        //         'created_at'=>Carbon::now(),
        //     ]);

        //     $loop++;
        //     }
        // }
        // else{
        //     echo 'faka';
        // }
    }

}
