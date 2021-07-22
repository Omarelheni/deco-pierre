<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Coupon;
use App\Models\LigneCommande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coms = Commande::all();
        return view('commandes',['coms'=>$coms,'utilisateur'=>Auth::user()]);
    }

    public function ajouterAuPanier($id)
    {
        $product = Produit::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        $coupon = session()->get('coupon');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "nom" => $product->nom,
                    "quantite" => 1,
                    "prix" => $coupon ? round($product->prix * (1-($coupon->pourcentage/100))) : $product->prix,
                    "description"=>$product->description,
                    "images" => $product->images,
                    "know" => 1
                ]
            ];
            session()->put('cart', $cart);
            return redirect('/panier');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantite']++;
            session()->put('cart', $cart);
            return redirect('/panier');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "nom" => $product->nom,
            "quantite" => 1,
            "prix" => $coupon ? round($product->prix * ( 1 - ($coupon->pourcentage/100))) : $product->prix,
            "description"=>$product->description,
            "images" => $product->images,
            "know" => 1
        ];
        session()->put('cart', $cart);
        return redirect('/panier');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $commande = Commande::findOrFail($id);
        $coms = Commande::all();
        return view('commandes',['coms'=>$coms,'utilisateur'=>Auth::user(),'commande'=>$commande]);
    }


    public function panier()
    {
        return view('panier');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function commande(Request $request)
    {
        $total = 0;
        $cart = session()->get('cart');
        $request->validate([
            'email' => 'required|string|email|max:255',
            'nom'=>'required|string|max:255',
            'prenom'=>'required|string|max:255',
            'adresse'=>'required|string|max:255',
            'telephone'=>'required|digits:8',
        ]);
        if (session()->get('cart')) {
            if (count(session()->get('cart')) > 0) {
                $com = Commande::create([
                    'nom' => $request->nom,
                    'email' => $request->email,
                    'prenom' => $request->prenom,
                    'adresse' => $request->adresse,
                    'telephone' => $request->telephone,
                    'prix' => 0
                ]);
                foreach ($cart as $id => $details) {
                    LigneCommande::create([
                        'produit_id' => $id,
                        'commande_id' => $com->id,
                        'aire' => $details['know'] == 1 ? $details['quantite'] : 0
                    ]);
                    if ($details['know'] == 1) {
                        $total += $details['quantite'] * $details['prix'];
                    }
                }
                $com->prix = $total;
                $com->save();
                session()->forget('cart');
            }else {
                return Response::json(array(
                    'code'      =>  500,
                    'message'   =>  'Veuillez ajouter des produits au panier'
                ), 401);            }
        }else {
            return Response::json(array(
                'code'      =>  500,
                'message'   =>  'Veuillez ajouter des produits au panier'
            ), 401);        }
        return view('panier');
    }

    public function  ajoutCommande(){
        return view('front/formulaire');
    }

    public function updateCoupon(Request $request)
    {

        $coupon =  Coupon::findOrFail($request->code);
        $coupon_prec =  session()->get('coupon');
        $cart = session()->get('cart')  ;

        foreach($cart as $id => $details){
            if ($coupon_prec) {
            $details['prix'] = $details['prix'] / ((100-$coupon_prec->pourcentage) / 100);
            }
            $details['prix'] = $details['prix'] * ((100-$coupon->pourcentage)/100) ;
            $cart[$id] = $details ;
        }

        session()->put('cart',$cart);
        session()->put('coupon', $coupon);
        return response()->json(['details'=>$details,'coupon_prec'=>$coupon_prec,'coupon'=>$coupon]);
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantite"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function update_know(Request $request)
    {
        if($request->id )
        {
            $cart = session()->get('cart');
            $cart[$request->id]["know"] = $request->know;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            return response()->json([
                'know' =>    $cart[$request->id]["know"] ,
            ]);        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function valider($idc)
    {
        $com = Commande::findOrFail($idc);

        $com->update([
            'statue'=>true
        ]);
        $coms = Commande::all();
        return view('commandes',['coms'=>$coms,'utilisateur'=>Auth::user()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
