<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Méthode pour afficher toutes les catégories
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    // Méthode pour afficher un formulaire de création de catégorie
    public function create()
    {
        return view('categories.create');
    }

    // Méthode pour enregistrer une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'code_categorie' => 'required',
            'nom_categorie' => 'required',
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    // Méthode pour afficher une catégorie spécifique
    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.show', compact('categorie'));
    }

    // Méthode pour afficher le formulaire de modification d'une catégorie
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    // Méthode pour mettre à jour une catégorie
    public function update(Request $request, $id)
    {
        $request->validate([
            'code_categorie' => 'required',
            'nom_categorie' => 'required',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    // Méthode pour supprimer une catégorie
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}
