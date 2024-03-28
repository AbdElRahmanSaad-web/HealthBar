<?php

namespace App\Http\Controllers\Admin\PromoCodes;

use App\DataTables\PromoCodeDataTable;
use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PromoCodeController extends Controller
{
    public function requests_index(PromoCodeDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.PromoCodes.index');
    }

    public function create()
    {
        return view('Dashboard.PromoCodes.create');
    }

    public function store(Request $request)
    {
        $valedator = $request->validate([
            "code"=>"required|unique:promo_codes,code",
            "discount_percentage"=>"required|numeric",
            "max_uses"=>"required|numeric",
            "valid_from"=>"required|date",
            "valid_to"=>"required|date",
            // "promoter"=>"required"
        ]);

       $data = PromoCode::create([
            'code'=>$request->code,
            'discount_percentage'=>$request->discount_percentage,
            'max_uses'=>$request->max_uses,
            'valid_from'=>$request->valid_from,
            'valid_to'=>$request->valid_to,
            // 'promoter_id'=>$request->promoter,
        ]);

        if($data)
        {
            return redirect(route('admin.promoCodes.index'))->with('success',"Promo Code created successfully");
        }
        else
        {
            return redirect(route('admin.promoCodes.create'))->with('error',"error while insert");
        }
    }

    public function edit($id)
    {
        $promoCode = PromoCode::find($id);
        // $promoters = Promoter::all();
        // $promoterName = $promoCode->promoter->name;
        // $promoCode->promoterName = $promoterName;

        if($promoCode)
        {
            return view('Dashboard.PromoCodes.update',compact('promoCode'));
        }
        else
        {
            return redirect(route('admin.promoCodes.index'))->with('error',"promo code not found!");
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            "id" =>"required",
            "code"=>["required",Rule::unique('promo_codes','code')->ignore($request->id)],
            "discount_percentage"=>"required",
            "max_uses"=>"required|integer",
            "valid_from"=>"required|date",
            "valid_to"=>"required|date",
            // "promoter"=>"required",
        ]);

        $promoCode = PromoCode::find($request->id);

        if($promoCode)
        {
            $promoCode->update([
                'code' => $request->code,
                'discount_percentage' => $request->discount_percentage,
                'max_uses' => $request->max_uses,
                'valid_from' => $request->valid_from,
                'valid_to' => $request->valid_to,
                // 'promoter_id' => $request->promoter,
            ]);

            return redirect(route('admin.promoCodes.index'))->with('success',"Promo Code Updated successfully");
        }
        else
        {
            return redirect(route('admin.promoCodes.index'))->with('error',"promo code not found!");
        }
    }

    public function delete($id)
    {
        $promoCode = PromoCode::find($id);

        if($promoCode)
        {
            $promoCode->delete();
            return redirect(route('admin.promoCodes.index'))->with('success',"Promo Code deleted successfully");
        }
        else
        {
            return redirect(route('admin.promoCodes.index'))->with('error',"promo code not found!");
        }
    }

}
