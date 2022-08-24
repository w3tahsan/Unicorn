<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function color(){
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.inventory.color_size', [
            'colors'=>$colors,
            'sizes'=>$sizes,
        ]);
    }
    function insert_color(Request $request){
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
    function insert_size(Request $request){
        Size::insert([
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }

    function inventory($product_id){
        $product_info = Product::find($product_id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventories = Inventory::where('product_id', $product_id)->get();
        return view('admin.inventory.inventory', [
            'product_info'=>$product_info,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'inventories'=>$inventories,
        ]);
    }

    function inventory_insert(Request $request){

        if(Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){
            Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);
            return back();
        }
        else{
            Inventory::insert([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
            return back();
        }
    }

}
