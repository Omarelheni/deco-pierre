<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cous = Coupon::all();
        return view('coupons',['cous'=>$cous,'utilisateur'=>Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'min:2|max:255|required|unique:coupons',
        ]);
        Coupon::create([
            'code'=>$request->code,
            'pourcentage'=>$request->pourcentage
        ]);
        return redirect()->route('coupons.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cous = Coupon::all();
        $Coupon = Coupon::find($id);
        return view('coupons_edit',['cous'=>$cous,'coupon'=>$Coupon,'utilisateur'=>Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'=>'min:2|max:255|required',
        ]);
        $Coupon = Coupon::where('code',$id)->first();
        $Coupon->update([
            'code'=>$request->code,
            'pourcentage'=>$request->pourcentage
        ]);
        return redirect()->route('coupons.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cou = Coupon::findOrFail($id);
        $cou->delete();
        return redirect()->route('coupons.index');

    }
}
