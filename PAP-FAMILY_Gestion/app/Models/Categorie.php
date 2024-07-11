<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categorie';

    protected $fillable = ['code_categorie', 'nom_categorie'];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_categorie');
    }

    public function matieresPremieres()
    {
        return $this->hasMany(MatierePremiere::class, 'id_categorie');
    }
}

