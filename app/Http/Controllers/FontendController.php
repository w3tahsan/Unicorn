<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Cookie;
use Arr;
use function Ramsey\Uuid\v1;

class FontendController extends Controller
{
    //
    public function  welcome()
    {
        return view('fontend.welcome');
    }

    function index(){
        $products = Product::latest()->take(6)->get();
        $categories = Category::all();
        $new_arrival = Product::latest()->take(4)->get();

        $get_recent = json_decode(Cookie::get('recent_view'), true);
        if($get_recent == null){
            $get_recent = [];
            $after_unique = array_unique($get_recent);
        }
        else{
            $after_unique = array_unique($get_recent);
        }



        $all_recent_product = Product::find($after_unique);

        $best_selling = OrderProduct::groupBy('product_id')
        ->selectRaw('sum(quantity) as sum, product_id')
        ->orderBy('quantity', 'DESC')
        ->havingRaw('sum >=2')
        ->get();



        return view('frontend.index', [
            'products'=>$products,
            'categories'=>$categories,
            'new_arrival'=>$new_arrival,
            'all_recent_product'=>$all_recent_product,
            'best_selling'=>$best_selling,
        ]);
    }

    function product_details($product_id){
        $product_info = Product::find($product_id);
        $related_products = Product::where('id', '!=', $product_id)->where('category_id', $product_info->category_id)->get();
        $available_colors = Inventory::where('product_id', $product_id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get();
        $reviews = OrderProduct::where('product_id', $product_id)->whereNotNull('review')->get();
        $total_review = OrderProduct::where('product_id', $product_id)->whereNotNull('review')->count();
        $total_star = OrderProduct::where('product_id', $product_id)->whereNotNull('review')->sum('star');

        $al = Cookie::get('recent_view');
        if(!$al){
            $al = "[]";
        }

        $all_info = json_decode($al, true);
        $all_info = Arr::prepend($all_info, $product_id);
        $recent_product_id = json_encode($all_info);

        Cookie::queue('recent_view', $recent_product_id, 1000);

        return view('frontend.product_details', [
            'product_info'=>$product_info,
            'available_colors'=>$available_colors,
            'related_products'=>$related_products,
            'reviews'=>$reviews,
            'total_review'=>$total_review,
            'total_star'=>$total_star,
        ]);
    }

    function getSize(Request $request){
        $str = '<option value="" class="colr_id" data-col="'.$request->color_id.'">Choose A Option</option>';
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        foreach($sizes as $size){
            $str .= '<option value="'.$size->size_id.'">'.$size->rel_to_size->size_name.'</option>';
        }
        echo $str;
    }
    function getSizes(Request $request){
        $str = '<option value="">Choose A Option</option>';
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        foreach($sizes as $size){
            $str .= '<option value="'.$size->size_id.'">'.$size->rel_to_size->size_name.'</option>';
        }
        echo $str;
    }
    function stock(Request $request){
        if(Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->first()->quantity == 0){
            echo '<button class="btn btn-warning">Out of Stock</button>';
        }
        else{
            echo ' <button class="btn btn_primary addtocart_btn" type="submit">Add To Cart</button>';
        }
    }

    function review(Request $request){
        OrderProduct::where('user_id', Auth::guard('customerlogin')->id())->where('product_id', $request->product_id)->update([
            'review'=>$request->review,
            'star'=>$request->star,
            'updated_at'=>Carbon::now(),
        ]);
        return back();
    }

    function shop(Request $request){
        $data = $request->all();

        $filed = 'created_at';
        $order = 'DESC';

        if(!empty($data['sort']) && $data['sort'] != '' && $data['sort'] != 'undefined'){
            if($data['sort'] == 1){
                $filed = 'product_name';
                $order = 'ASC';
            }
            else if($data['sort'] == 2){
                $filed = 'product_name';
                $order = 'DESC';
            }
            else if($data['sort'] == 3){
                $filed = 'after_discount';
                $order = 'ASC';
            }
            else if($data['sort'] == 4){
                $filed = 'after_discount';
                $order = 'DESC';
            }
            else{
                $filed = 'created_at';
                $order = 'DESC';
            }
        }

        $all_products = Product::where(function ($q) use ($data){
            if(!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined'){
                $q->where(function ($q) use ($data){
                    $q->where('product_name', 'like', '%'.$data['q'].'%');
                    $q->orWhere('short_desp', 'like', '%'.$data['q'].'%');
                });
            }
            if(!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id'] != 'undefined'){
                $q->where('category_id', $data['category_id']);
            }
            if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined' || !empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined'){
                $q->whereHas('inventories', function ($q) use ($data){
                    if(!empty($data['color_id']) && $data['color_id'] != '' && $data['color_id'] != 'undefined'){
                        $q->whereHas('rel_to_color', function ($q) use ($data){
                            $q->where('colors.id', $data['color_id']);
                        });
                    }
                    if(!empty($data['size_id']) && $data['size_id'] != '' && $data['size_id'] != 'undefined'){
                        $q->whereHas('rel_to_size', function ($q) use ($data){
                            $q->where('sizes.id', $data['size_id']);
                        });
                    }
                });
            }
        })->orderBy($filed, $order)->get();

        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('frontend.shop', [
            'all_products'=>$all_products,
            'categories'=>$categories,
            'colors'=>$colors,
            'sizes'=>$sizes,
        ]);
    }

}
