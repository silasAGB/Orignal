<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Méthode pour afficher tous les produits
    public function index()
    {
        $produits = Produit::all();
        return view('boilerplate::produits.list', compact('produits'));
    }

    // Méthode pour afficher un formulaire de création de produit
    public function create()
    {
        $categories = Categorie::all();
        return view('boilerplate::produits.create', compact('categories'));
    }

    // Méthode pour enregistrer un nouveau produit
    public function store(Request $request)
{
    $request->validate([
        'reference_produit' => 'required',
        'nom_produit' => 'required',
        'description_produit' => 'nullable',
        'prix_details_produit' => 'required|numeric',
        'prix_gros_produit' => 'nullable|numeric',
        'qte_preparation' => 'nullable|numeric',
        'qte_lot' => 'nullable|numeric',
        'qte_stock' => 'required|numeric',
        'stock_min' => 'nullable|numeric',
        'emplacement' => 'nullable|string',
        'id_Categorie' => 'required|exists:categories,id_categorie',
    ]);

    $produit = Produit::create($request->all());

    return redirect()->route('boilerplate.produits.index')
        ->with('success', 'Produit ajouté avec succès.');
}

    // Méthode pour afficher les détails d'un produit spécifique
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('boilerplate::produits.show', compact('produit'));
    }

    // Méthode pour afficher le formulaire de modification d'un produit
    public function edit($id_produit)
    {
        $produit = Produit::findOrFail($id_produit);
        $categories = Categorie::all();
        return view('boilerplate::produits.edit', compact('produit', 'categories'));
    }

    // Méthode pour mettre à jour un produit
    public function update(Request $request, $id_produit)
    {
        $request->validate([
            'reference_produit' => 'required',
            'nom_produit' => 'required',
            'description_produit' => 'nullable',
            'prix_details_produit' => 'required|numeric',
            'prix_gros_produit' => 'nullable|numeric',
            'qte_preparation' => 'nullable|numeric',
            'qte_lot' => 'nullable|numeric',
            'qte_stock' => 'required|numeric',
            'stock_min' => 'nullable|numeric',
            'emplacement' => 'nullable|string',
            'id_Categorie' => 'required|exists:categories,id_categorie',
        ]);

        $produit = Produit::findOrFail($id_produit);
        $produit->update($request->all());

        return redirect()->route('boilerplate.produits.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    // Méthode pour supprimer un produit
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('boilerplate.produits.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}
