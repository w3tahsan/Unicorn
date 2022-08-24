<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function subcategory(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', [
            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ]);
    }
    function insert(Request $request){

        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ]);

        if(Subcategory::where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()){
            return back()->with('exist', 'Subcategory Allready Exist in this Category');
        }
        else{
            Subcategory::insert([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'created_at'=>Carbon::now(),
            ]);
            return back();
        }
    }

    function edit($subcategory_id){
        $categories = Category::all();
        $subcategories_info = Subcategory::find($subcategory_id);
        return view('admin.subcategory.edit', [
            'categories'=>$categories,
            'subcategories_info'=>$subcategories_info,
        ]);
    }

    function update(Request $request){

        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ]);

        if(Subcategory::where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()){
            return back()->with('exist', 'Subcategory Allready Exist in this Category');
        }
        else{
            Subcategory::find($request->subcategory_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'updated_at'=>Carbon::now(),
            ]);
            return redirect()->route('add.subcategory');
        }


    }
}
