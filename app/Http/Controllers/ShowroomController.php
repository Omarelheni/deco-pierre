<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Showroom::all();
        return view('showrooms',['shows'=>$shows,'utilisateur'=>Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shows = Showroom::all();
        return view('showrooms', ['shows' => $shows,'utilisateur'=>Auth::user()]);
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
            'adresse'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',
            'adresse_map'=>'required'
        ]);
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'),$imageName);

        Showroom::create([
            'adresse'=>$request->adresse,
            'image_name'=>$imageName,
            'adresse_map'=>$request->adresse_map
        ]);
        return redirect()->route('showrooms.index');

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shows = Showroom::all();
        $show = Showroom::find($id);
        return view('showrooms_edit',['shows'=>$shows,'showroom'=>$show,'utilisateur'=>Auth::user()]);
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
            'adresse'=>'required',
            'adresse_map'=>'required'
        ]);
        $showroom = Showroom::findOrFail($id);
        if (!(is_null($request->image))) {

            $imageName = time() . '.' . $request->image->extension();
            if (File::exists(public_path('images/' . $showroom->image_name))) {
                File::delete(public_path('images/' . $showroom->image_name));
            }
            $request->image->move(public_path('images'), $imageName);
            /** @var Showroom $showroom */
            $showroom->update([
                'adresse' => $request->adresse,
                'image_name' => $imageName,
                'adresse_map' => $request->adresse_map
            ]);
        }else {
            $showroom->update([
                'adresse' => $request->adresse,
                'adresse_map' => $request->adresse_map
            ]);
        }
        return redirect()->route('showrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $show = Showroom::findOrFail($id);
        if (File::exists(public_path('images/' . $show->image_name))) {
            File::delete(public_path('images/' . $show->image_name));
        }
        $show->delete();
        return redirect()->route('showrooms.index');

    }

    }
