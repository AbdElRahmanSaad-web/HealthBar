<?php

namespace App\Http\Controllers\Admin\PromoCodes;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function index()
    {
        $promoCodes = PromoCode::get();

        return view('Dashboard.PromoCodes.index', compact('promoCodes'));
    }

    public function create()
    {
        return view('Dashboard.PromoCodes.create');
    }
}
