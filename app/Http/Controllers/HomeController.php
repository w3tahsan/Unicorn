<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $todays_sales = Order::whereDate('created_at', Carbon::today())->sum('total');
        $yesterday_sales = Order::whereDate('created_at', Carbon::yesterday())->sum('total');
        $last_week = Order::where('created_at', '>=', Carbon::today()->subDays(7))->sum('total');
        $last_month = Order::where('created_at', '>=', Carbon::today()->subDays(30))->sum('total');
        $last_month_pro = OrderProduct::where('created_at', '>=', Carbon::today()->subDays(30))->count();
        $last_month_order = Order::where('created_at', '>=', Carbon::today()->subDays(30))->count();
        $last_month_pro_quan = OrderProduct::where('created_at', '>=', Carbon::today()->subDays(30))->sum('quantity');

        return view('home', [
            'todays_sales'=>$todays_sales,
            'yesterday_sales'=>$yesterday_sales,
            'last_week'=>$last_week,
            'last_month'=>$last_month,
            'last_month_pro'=>$last_month_pro,
            'last_month_order'=>$last_month_order,
            'last_month_pro_quan'=>$last_month_pro_quan,
        ]);
    }
    public function userList()
    {
        $total_user = User::count();
        $all_users = User::Where('id', '!=', Auth::id())->Paginate(4);
        return view('admin.user.user', compact('all_users', 'total_user'));
    }
    public function userDelete($user_id)
    {
        User::find($user_id)->delete();
        return back()->with('delete', 'User Delete Sucessfully');
    }
    // public function dash()
    // {
    //     return view('layouts.dashboard');
    // }

    // profile update all from view
    public function profileChange()
    {
        return view('admin.user.profile');
    }

    // profile name change
    public function nameChange(Request $request)
    {
        // print_r($request->all());
        $request->validate([

            'name' => 'required',
        ], [
            'category_name.required' => 'Name Requried',

        ]);

        User::find(Auth::id())->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('update', 'User Name Update Sucessfully');
    }

    // profile password update
    public  function passwordUpdate(Request $request)
    {
        $request->validate([

            'old_password' => 'required',
            'password' => 'required',
            'password' =>  Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols(),
            'password' => 'confirmed',



            // 'password' => [
            //     'required',
            //     'confirmed',
            //     Password::min(8)
            //         ->mixedCase()
            //         ->letters()
            //         ->numbers()
            //         ->symbols()
            //         ->uncompromised(),
            // ],

        ]);
        if (Hash::check($request->old_password, Auth::user()->password)) {

            if (Hash::check($request->password, Auth::user()->password)) {

                return back()->with('same_pass', 'Old Pass And current pass same');
            } else {

                // echo 'nai';
                User::find(Auth::id())->update([

                    'password' => bcrypt($request->password),
                    'updated_at' => Carbon::now(),

                ]);
                return back()->with('update', 'Password Update  Sucessfully!!');
            }
        } else {
            // echo 'Old Pass Not Correct';
            return back()->with('wrong_pass', 'Old Pass Not Correct');
        }
    }

    // profile picture update
    public function pictureUpdate(Request $request)
    {
        $request->validate([
            'profile_photo' => 'file|max:1024',

            'profile_photo' => 'mimes:jpg,jpeg,png',
        ]);
        // print_r($request->all());
        $uploaded_photo = $request->profile_photo;
        $extention = $uploaded_photo->getClientOriginalExtension();
        // echo $extention;
        $filename = Auth::id() . '.' . $extention;


        if (Auth::user()->profile_photo == 'defult.jpg') {
            Image::make($uploaded_photo)->save(public_path('/uploads/users/' . $filename));
            User::find(Auth::id())->update([
                'profile_photo' => $filename,
            ]);
            return back();
        } else {
            $delete_form = public_path('uploads/users/' . Auth::user()->profile_photo);
            unlink($delete_form);
            Image::make($uploaded_photo)->save(public_path('/uploads/users/' . $filename));
            User::find(Auth::id())->update([
                'profile_photo' => $filename,
            ]);
        }

        return back();
    }
}
