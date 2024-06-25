<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatierePremiere extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_MP';

    protected $fillable = ['nom_MP', 'prix_achat', 'qte_stock', 'seuil_stock', 'unite'];

    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class, 'fournisseur_mat', 'id_MP', 'id_fournisseur');
    }
}
