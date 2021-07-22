<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Image;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
class ProduitController extends Controller

{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categorie::all();
        $prods = Produit::all();
        return view('produits',['prods'=>$prods,'cats'=>$cats,'utilisateur'=>Auth::user()]);
    }

    public function showf (Request $request)
    {
        $categorie = $request->cat?$request->cat:"";
        $prods = Produit::all();
        $nb = Produit::all()->count();
        $cats = Categorie::all();
        return view('front/produits',['prods'=>$prods,'nb'=>$nb,'cats'=>$cats,'categorie'=>$categorie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produits');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'min:2|max:255|required',
            'prix'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantite'=>'required|integer|min:0',
            'filenames' => 'required',
            'filenames.*' => 'image'
        ]);
        $produit= Produit::create([
            'nom'=>$request->input('nom'),
            'description'=>$request->input('description'),
            'quantite'=>$request->input('quantite'),
            'prix'=>$request->input('prix'),
        ]);
        $cat = Categorie::find($request->categorie);

        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,1000).'.'.$file->extension();
                $file->move(public_path('images/'), $name);
               $image = Image::create([
                    'image_name'=>$name
                ]);
               $image->produit_i()->associate($produit);
                $image->save();

            }
        }

       $produit->p_categorie()->associate($cat);
       $produit->save();
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ('front/description');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Produit::findOrFail($id);
        $cats = Categorie::all();
        $prods = Produit::all();
        return view('produits_edit',['produit'=>$prod,'prods'=>$prods,'cats'=>$cats,'utilisateur'=>Auth::user()]);

    }

    public function showd(Request $request)
    {
        $prod = Produit::findOrFail($request->id);
        return view('front/description',['prod'=>$prod]);
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
            'prix'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantite'=>'required|integer|min:0',
        ]);

        $prod = Produit::findOrFail($id);
        $prod->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'quantite' => $request->input('quantite'),
            'prix' => $request->input('prix'),
            'categorie'=>$request->categorie
        ]);
        if($request->hasfile('filenames')) {
            $imgs = Image::where('produit', $prod->id)->get();
            foreach ($imgs as $img){
                $img->delete();
                if (File::exists(public_path('images/'.$img->image_name))) {
                    File::delete(public_path('images/'.$img->image_name));
                }
            }

            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 1000) . '.' . $file->extension();
                $file->move(public_path('images/'), $name);
                $image = Image::create([
                    'image_name' => $name
                ]);
                $image->produit_i()->associate($prod);
                $image->save();

            }

        }
        return redirect()->route('produits.index')
            ->with('success','Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $prod = Produit::findOrFail($id);
        $imgs = Image::where('produit', $prod->id)->get();
        foreach ($imgs as $img){
            $img->delete();
            if (File::exists(public_path('images/'.$img->image_name))) {
                File::delete(public_path('images/'.$img->image_name));
            }
        }
        $prod->delete();
        return redirect()->route('produits.index')->with('success','le produit a été crée avec succes.');
    }
}
