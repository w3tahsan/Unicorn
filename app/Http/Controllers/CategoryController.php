<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // view category page
    public function index()
    {
        $all_category = Category::all();
        $trash_all = Category::onlyTrashed()->get();


        return view('admin.category.index', [
            'all_category' => $all_category,
            'trash_all' => $trash_all,
        ]);
        // print_r($all_category->id);
    }
    //insert category item
    public function insertCategory(CategoryRequest $request)
    {
        // echo  $request->category_name;
        // $request->validate([

        //     'category_name' => 'required|unique:categories',
        // ], [
        //     'category_name.required' => 'Category Name Dite Hobe',
        //     'category_name.unique' => 'Category Name Already Ace',

        // ]);
        Category::insert([
            'user_id' => Auth::id(),
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success_msg', 'Category Add Sucessfully!!');
    }

    // category edit
    public function edit($category_id)
    {
        // echo $category_id;
        $category_info = Category::find($category_id);
        return view('admin.category.edit', compact('category_info'));
    }

    // category update
    public function updateCategory(Request $request)
    {
        // print_r($request->all());
        Category::find($request->id)->update([
            // 'user_id' => Auth::id(),
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now(),

        ]);
        return redirect('/add/category')->with('update', 'Category Update Sucessfully!!');
    }

    // category soft delete
    public function categorySoftDelete($category_id)
    {
        Category::find($category_id)->delete();
        return back()->with('delete', 'Category Delete Sucessfully');
    }


    // category all mark soft delete/ data store database  but view page data delete
    public function markSoftDelete(Request $request)
    {
        // print_r($request->mark);
        foreach ($request->mark as $mark) {
            // print_r($mark);
            Category::find($mark)->delete();
        }
        return back();
    }

    // category restore/Trash restore
    public function restoreCategory($category_id)
    {
        // echo $category_id;
        Category::onlyTrashed()->find($category_id)->restore();
        return back();
    }

    // category hard delete/delete database category
    public function categoryHardDelete($category_id)
    {
        Category::onlyTrashed()->find($category_id)->forceDelete();
        return back();
    }

    // marnk all restore
    public function markAllrestore(Request $request)
    {

        // print_r($request->markRestoreAll);
        foreach ($request->markRestoreAll as $restoreAll) {

            Category::withTrashed()->find($restoreAll)->restore();
        }
        return back();
    }
}
