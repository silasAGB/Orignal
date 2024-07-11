<?php

namespace App\Http\Controllers;

use App\Models\MatierePremiere;
use App\Models\Categorie;
use Illuminate\Http\Request;

class MatierePremiereController extends Controller
{
    // Méthode pour afficher toutes les matières premières
    public function index()
    {
        $matieresPremieres = MatierePremiere::all();
        return view('boilerplate::matierepremieres.list', compact('matieresPremieres'));
    }

    // Méthode pour afficher un formulaire de création de matière première
    public function create()
    {
        $categories = Categorie::all(); // Pour permettre la sélection de la catégorie dans le formulaire
        return view('boilerplate::matierepremieres.create', compact('categories'));
    }

    // Méthode pour enregistrer une nouvelle matière première
    public function store(Request $request)
    {
        $request->validate([
            'nom_MP' => 'required',
            'prix_achat' => 'required|numeric',
            'unite' => 'required',
            'qte_stock' => 'required|numeric',
            'stock_min' => 'required|numeric',
            'emplacement' => 'required|string',
            'id_categorie' => 'required|exists:categories,id_categorie',
        ]);

        $matierePremiere = MatierePremiere::create($request->all());

        return redirect()->route('boilerplate.matierepremieres.index')
            ->with('success', 'Matière première ajoutée avec succès.');
    }

    // Méthode pour afficher les détails d'une matière première spécifique
    public function show($id_MP)
    {
        $matierePremiere = MatierePremiere::findOrFail($id_MP);
        return view('boilerplate::matierepremieres.show', compact('matierePremiere'));
    }

    // Méthode pour afficher le formulaire de modification d'une matière première
    public function edit($id_MP)
    {
        $matierePremiere = MatierePremiere::findOrFail($id_MP);
        $categories = Categorie::all(); // Pour permettre la sélection de la catégorie dans le formulaire
        return view('boilerplate::matierepremieres.edit', compact('matierePremiere', 'categories'));
    }

    // Méthode pour mettre à jour une matière première
    public function update(Request $request, $id_MP)
    {
        $request->validate([
            'nom_MP' => 'required',
            'prix_achat' => 'required|numeric',
            'unite' => 'required',
            'qte_stock' => 'required|numeric',
            'stock_min' => 'required|numeric',
            'emplacement' => 'required|string',
            'id_categorie' => 'required|exists:categories,id_categorie',
        ]);

        $matierePremiere = MatierePremiere::findOrFail($id_MP);
        $matierePremiere->update($request->all());

        return redirect()->route('boilerplate.matierepremieres.index')
        ->with('growl', ["Matière première mise à jour avec succès.", 'success']);
    }

    // Méthode pour supprimer une matière première
    public function destroy($id_MP)
    {
        $matierePremiere = MatierePremiere::findOrFail($id_MP);
        $matierePremiere->delete();

        return redirect()->route('boilerplate.matierepremieres.index')
        ->with('growl', ["Matière première supprimé avec succès.", 'success']);
    }
}
