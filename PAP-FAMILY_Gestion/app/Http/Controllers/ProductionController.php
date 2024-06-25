<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    // Méthode pour afficher toutes les productions
    public function index()
    {
        $productions = Production::all();
        return view('productions.index', compact('productions'));
    }

    // Méthode pour afficher un formulaire de création de production
    public function create()
    {
        return view('productions.create');
    }

    // Méthode pour enregistrer une nouvelle production
    public function store(Request $request)
    {
        $request->validate([
            'date_prevue' => 'required|date',
            'qte_prevue' => 'required|numeric',
            'id_Produit' => 'required|exists:produits,id_Produit',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        Production::create($request->all());

        return redirect()->route('productions.index')
            ->with('success', 'Production ajoutée avec succès.');
    }

    // Méthode pour afficher les détails d'une production spécifique
    public function show($id)
    {
        $production = Production::findOrFail($id);
        return view('productions.show', compact('production'));
    }

    // Méthode pour afficher le formulaire de modification d'une production
    public function edit($id)
    {
        $production = Production::findOrFail($id);
        return view('productions.edit', compact('production'));
    }

    // Méthode pour mettre à jour une production
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_prevue' => 'required|date',
            'qte_prevue' => 'required|numeric',
            'id_Produit' => 'required|exists:produits,id_Produit',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $production = Production::findOrFail($id);
        $production->update($request->all());

        return redirect()->route('productions.index')
            ->with('success', 'Production mise à jour avec succès.');
    }

    // Méthode pour supprimer une production
    public function destroy($id)
    {
        $production = Production::findOrFail($id);
        $production->delete();

        return redirect()->route('productions.index')
            ->with('success', 'Production supprimée avec succès.');
    }
}
