<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $cats = Categorie::all();
        return view('categories',['cats'=>$cats,'utilisateur'=>Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categorie::all();
        return view('categories',['cats'=>$cats]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'min:2|max:255|required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);

        $imageName = time() . '.' . $request->image->extension();



        $request->image->move(public_path('images'),$imageName);

        Categorie::create([
            'nom'=>$request->input('nom'),
            'image_name'=>$imageName,
        ]);
        return redirect()->route('categories.index');
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
        $cats = Categorie::all();
        $categorie = Categorie::findOrFail($id);
        return view('categories_edit',['categorie'=>$categorie,'cats'=>$cats,'utilisateur'=>Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'=>'min:2|max:255|required',
            'image'=>'mimes:jpg,png,jpeg'
        ]);
        $cat = Categorie::findOrFail($id);
        if (!(is_null($request->image))) {
            $imageName = time() . '.' . $request->image->extension();

            if (File::exists(public_path('images/' . $cat->image_name))) {
                File::delete(public_path('images/' . $cat->image_name));
            }

            $request->image->move(public_path('images'), $imageName);
            $cat->update([
                'nom'=>$request->input('nom'),
                'image_name'=>$imageName
            ]);
        }else {
            $cat->update([
                'nom'=>$request->input('nom'),
            ]);
        }


        return redirect()->route('categories.index')
            ->with('success','Categorie mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cat = Categorie::findOrFail($id);
        if (File::exists(public_path('images/'.$cat->image_name))) {
            File::delete(public_path('images/'.$cat->image_name));
        }
        $cat->delete();

        return redirect()->route('categories.index')->with('success','la categorie a été crée avec succes.');
    }
}
