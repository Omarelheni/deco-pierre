<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','prix','adresse','telephone','email','statue'];

    public function lignecommandes(){
        return $this->hasMany(LigneCommande::class);
    }
}
