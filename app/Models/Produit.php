<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom','quantite','description','prix','image_name','categorie'];
    public function p_categorie(){
        return $this->belongsTo(Categorie::class,'categorie','nom');
    }
    public function images(){
        return $this->hasMany(Image::class,'produit','id');
    }
    public function lignecommandes()
    {
        return $this->hasMany(LigneCommande::class);
    }




}
