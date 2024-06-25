<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_approvisionnement';

    protected $fillable = ['date_approvisionnement', 'reference_approvisionnement', 'qte_approvisionnement', 'montant', 'id_fournisseur'];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fournisseur');
    }
}
