<?php

namespace App\Http\Controllers;

use App\RepositoryInterface\AuthRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $AuthRepository;

    public function __construct(AuthRepositoryInterface $AuthRepository)
    {
        $this->AuthRepository = $AuthRepository;
    }

    public function login_form()
    {
        return view('dashboard.admin.Auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);
        $this->AuthRepository->login($credentials);

        return view('dashboard.admin.home');
		
    }

    public function dashboard(){
        return view('dashboard.admin.home');
    }

    public function logout(){
        return 1;
    }
}
