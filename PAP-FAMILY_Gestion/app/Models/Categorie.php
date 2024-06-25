<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categorie';

    protected $fillable = ['code_categorie', 'nom_categorie'];

    public function produit ()
    {
        return $this->hasMany(produit::class, 'id_categorie');
    }
}
