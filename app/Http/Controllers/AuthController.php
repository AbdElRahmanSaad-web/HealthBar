<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
//use App\Http\Requests\Auth\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

use function App\helpers\update;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_form()
    {
        return view('dashboard.admin.Auth.login');
    }


    //     public function login(Request $request)
    //     {
    //         $request->validate([
    //             'email' => 'required',
    //             'password' => 'required',
    //         ]);

    //         $credentials = $request->only(['email', 'password']);
    //         return self::userAuth($credentials) ?? self::adminAuth($credentials, $request) ?? back();

    // //        dd (Auth::guard(\)attempt($credentials));
    // //        if (Auth::attempt($credentials) || Auth::guard('admin')->attempt($credentials)){
    // //            session()->put('appKey', Auth::user()->appKey);
    // //            return redirect()->intended('/')
    // //                ->withSuccess('Signed in');
    // //        }
    // //        return redirect("login")->withSuccess('Login details are not valid');
    //     }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $loginField = filter_var(request()->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'userName';
        $admin = User::where('admin', '1')->where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            $credentials = $request->only(['email', 'password']);
            return self::adminAuth($credentials, $request) ?? back();
        }
        dd($admin);
        return back();
    }

    public function dashboard()
    {

        if (Auth::check()) {
            return view('dashboard.admin.home');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login_form');
    }

    public function profile()
    {
        $admin = auth()->user();
        return view(session('dashboard') . '.admin.Auth.profile', compact('admin'));
    }

    public function edit_profile(Request $request)
    {
        // $email = auth()->user()->email;
        // $password = $request->get('old_password');
        // $result = Auth::attempt(['email' => $email, 'password' => $password]);
        // if ($result) {
        $admin = Auth::user();
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->save();
        if ($admin->save()) {
            // session()->flash('Success', 'Data Updated Successfully');

            return redirect()->route('home')->with(['success' => __('words.admin_deleted'), 'status' => 'success']);
        }
        // else {
        //     session()->flash('ERROR', 'Error Occur Edit Profile');
        //     return redirect()->route('home');
        // }
        // session()->flash('ERROR', 'Error Password', 'error');
        return redirect()->route('home')->with('error', 'Error Occur Edit Profile');
    }

    static function adminAuth($credentials, $request)
    {
        if (Auth::guard('web')->attempt($credentials, $request->get('remember'))) {
            $data = auth('web')->user();
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }
    }

    static function userAuth()
    {
        //        dd("test");
        if (Auth::guard('user')->attempt(['userName' => request()->email, 'password' => request()->password])) {
            // dd('aly');
            //            if(Auth::guard('user')->user()->type == 'staff' ||
            //            Auth::guard('user')->user()->type == 'master'   ||
            //            Auth::guard('user')->user()->type == 'employee' ||
            //            Auth::guard('user')->user()->type == 'manager'){
            $data = Auth('user')->user();
            session(['appKey' => $data->appKey, 'dashboard' => $data->theme]);
            //                dd(Auth::guard('user')->user()->appKey);
            //                dd(Auth::user()->appKey);
            //                dd(session()->get('appKey'));
            //                return redirect()->intended('/companyAdmin')
            //                    ->withSuccess('Signed in');
            // $authGuard = app('auth');
            // dd($authGuard);
            return redirect()->intended('/')
                ->withSuccess('Signed in');

            //                return view(session('dashboard').'.admin.companyAdmin');
        }
        // return redirect(url('/'));
    }
}
