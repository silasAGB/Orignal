<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Méthode pour afficher tous les produits
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    // Méthode pour afficher un formulaire de création de produit
    public function create()
    {
        return view('produits.create');
    }

    // Méthode pour enregistrer un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'reference_Produit' => 'required',
            'nom_Produit' => 'required',
            'prix_details_Produit' => 'required|numeric',
            'qte_Stock' => 'required|numeric',
            'id_categorie' => 'required|exists:categories,id_categorie',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')
            ->with('success', 'Produit ajouté avec succès.');
    }

    // Méthode pour afficher les détails d'un produit spécifique
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.show', compact('produit'));
    }

    // Méthode pour afficher le formulaire de modification d'un produit
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    // Méthode pour mettre à jour un produit
    public function update(Request $request, $id)
    {
        $request->validate([
            'reference_Produit' => 'required',
            'nom_Produit' => 'required',
            'prix_details_Produit' => 'required|numeric',
            'qte_Stock' => 'required|numeric',
            'id_categorie' => 'required|exists:categories,id_categorie',
        ]);

        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        return redirect()->route('produits.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    // Méthode pour supprimer un produit
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}
