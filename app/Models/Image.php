<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['image_name'];
    public function produit_i(){
        return $this->belongsTo(Produit::class,'produit','id');
    }

}
