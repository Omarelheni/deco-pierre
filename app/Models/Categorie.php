<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $primaryKey = 'nom';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nom','image_name'];
    public function produits(){
        return $this->hasMany(Produit::class,'categorie','nom');
    }

}
