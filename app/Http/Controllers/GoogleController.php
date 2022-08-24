<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }
    function handleToProviderCallback(){
        $user = Socialite::driver('google')->user();

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
