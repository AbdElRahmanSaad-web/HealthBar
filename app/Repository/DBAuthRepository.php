<?php

namespace App\Repository;

use App\RepositoryInterface\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class DBAuthRepository implements AuthRepositoryInterface{
    public function login($credentials){
        
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }
    }

    public function logout(){

    }

    // public function dashboardHome(){

    // }
}