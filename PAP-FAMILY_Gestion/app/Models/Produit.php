<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_Produit';

    protected $fillable = ['reference_Produit', 'nom_Produit', 'description_Produit', 'prix_details_Produit', 'prix_gros_Produit', 'prix_Preparation', 'qte_Lot', 'qte_Stock', 'id_categorie'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    public function matierePremieres()
    {
        return $this->belongsToMany(MatierePremiere::class, 'matiere_produit', 'id_Produit', 'id_MP');
    }
}
