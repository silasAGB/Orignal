<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ApprovisionnementController extends Controller
{
    // Afficher la liste de tous les approvisionnements
    public function index()
    {
        $approvisionnements = Approvisionnement::with('fournisseur')->get();

        // Retourner la vue 'approvisionnements.index'
        return view('approvisionnements.index', compact('approvisionnements'));
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();

        // Retourner la vue 'approvisionnements.create'
        return view('approvisionnements.create', compact('fournisseurs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'date_approvisionnement' => 'required|date',
            'reference_approvisionnement' => 'required',
            'qte_approvisionnement' => 'required|integer',
            'montant' => 'required|numeric',
            'id_fournisseur' => 'required|exists:fournisseurs,id_fournisseur'
        ]);

        Approvisionnement::create($request->all());

        return redirect()->route('approvisionnements.index')->with('success', 'Approvisionnement créé avec succès.');
    }

    public function edit($id_approvisionnement)
    {
        $approvisionnement = Approvisionnement::findOrFail($id_approvisionnement);

        $fournisseurs = Fournisseur::all();

        return view('approvisionnements.edit', compact('approvisionnement', 'fournisseurs'));
    }

    // Mettre à jour un approvisionnement existant dans la base de données
    public function update(Request $request, $id_approvisionnement)
    {
        $request->validate([
            'date_approvisionnement' => 'required|date',
            'reference_approvisionnement' => 'required',
            'qte_approvisionnement' => 'required|integer',
            'montant' => 'required|numeric',
            'id_fournisseur' => 'required|exists:fournisseurs,id_fournisseur'
        ]);

        $approvisionnement = Approvisionnement::findOrFail($id_approvisionnement);

        $approvisionnement->update($request->all());
        return redirect()->route('approvisionnements.index')->with('success', 'Approvisionnement mis à jour avec succès.');
    }

    // Supprimer un approvisionnement existant de la base de données
    public function destroy($id_approvisionnement)
    {
        $approvisionnement = Approvisionnement::findOrFail($id_approvisionnement);

        $approvisionnement->delete();

       
        return redirect()->route('approvisionnements.index')->with('success', 'Approvisionnement supprimé avec succès.');
    }
}
