<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_fournisseur';

    protected $fillable = ['nom_fournisseur', 'contact_fournisseur', 'email_fournisseur', 'adresse_fournisseur'];

    public function approvisionnements()
    {
        return $this->hasMany(Approvisionnement::class, 'id_fournisseur');
    }
}
