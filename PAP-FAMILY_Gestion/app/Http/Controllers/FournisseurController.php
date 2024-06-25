<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    // Méthode pour afficher tous les fournisseurs
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    // Méthode pour afficher un formulaire de création de fournisseur
    public function create()
    {
        return view('fournisseurs.create');
    }

    // Méthode pour enregistrer un nouveau fournisseur
    public function store(Request $request)
    {
        $request->validate([
            'nom_fournisseur' => 'required',
            'contact_fournisseur' => 'required',
            'email_fournisseur' => 'required|email',
            'adresse_fournisseur' => 'required',
        ]);

        Fournisseur::create($request->all());

        return redirect()->route('fournisseurs.index')
            ->with('success', 'Fournisseur ajouté avec succès.');
    }

    // Méthode pour afficher les détails d'un fournisseur spécifique
    public function show($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs.show', compact('fournisseur'));
    }

    // Méthode pour afficher le formulaire de modification d'un fournisseur
    public function edit($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    // Méthode pour mettre à jour un fournisseur
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_fournisseur' => 'required',
            'contact_fournisseur' => 'required',
            'email_fournisseur' => 'required|email',
            'adresse_fournisseur' => 'required',
        ]);

        $fournisseur = Fournisseur::findOrFail($id);
        $fournisseur->update($request->all());

        return redirect()->route('fournisseurs.index')
            ->with('success', 'Fournisseur mis à jour avec succès.');
    }

    // Méthode pour supprimer un fournisseur
    public function destroy($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        $fournisseur->delete();

        return redirect()->route('fournisseurs.index')
            ->with('success', 'Fournisseur supprimé avec succès.');
    }
}
