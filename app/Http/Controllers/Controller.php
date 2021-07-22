<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Showroom;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function accueil()
    {
        $shows = Showroom::all();
        $cats = Categorie::all();

        return view('front/accueil',['shows'=>$shows,'cats'=>$cats]);
    }
    public function index()
    {
        $users = User::all();

        $data = DB::table('produits')
            ->selectRaw('produits.nom , count(ligne_commande.produit_id) AS nombre')
            ->join('ligne_commande', 'produits.id', '=', 'ligne_commande.produit_id')
            ->groupBy('produits.nom')
        ->get()->toJson();

        $datac = DB::table('commandes')
            ->selectRaw('commandes.created_at AS date_c, sum(commandes.prix) AS revenu')
            ->groupBy('commandes.created_at')
            ->get()->toJson();

        return view('base',['users'=>$users,'data'=>$data,'datac'=>$datac,'utilisateur'=>Auth::user()]);
    }

}
