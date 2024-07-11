<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatierePremiere extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_MP';

    protected $fillable = ['nom_MP', 'prix_achat','unite','qte_stock','stock_min','emplacement','id_categorie'];


    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

}
