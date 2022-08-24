<?php

namespace App\Http\Controllers;

use App\Models\CustomerLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GithubController extends Controller
{
    function redirectToProvider(){
        return Socialite::driver('github')->redirect();
    }
    function handleToProviderCallback(){
        $user = Socialite::driver('github')->user();

        if(CustomerLogin::where('email', $user->getEmail())->exists()){
            if(Auth::guard('customerlogin')->attempt(['email' => $user->getEmail(), 'password' => 'abc@123'])){
                return redirect('/');
            }
        }
        else{
            CustomerLogin::insert([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'password'=>bcrypt('abc@123'),
                'created_at'=>Carbon::now(),
            ]);

            if(Auth::guard('customerlogin')->attempt(['email' => $user->getEmail(), 'password' => 'abc@123'])){
                return redirect('/');
            }
        }
    }
}
