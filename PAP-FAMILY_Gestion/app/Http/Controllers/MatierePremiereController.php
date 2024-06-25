<?php

namespace App\Http\Controllers;

use App\Models\MatierePremiere;
use Illuminate\Http\Request;

class MatierePremiereController extends Controller
{
    // Méthode pour afficher toutes les matières premières
    public function index()
    {
        $matieresPremieres = MatierePremiere::all();
        return view('matieres.index', compact('matieresPremieres'));
    }

    // Méthode pour afficher un formulaire de création de matière première
    public function create()
    {
        return view('matieres.create');
    }

    // Méthode pour enregistrer une nouvelle matière première
    public function store(Request $request)
    {
        $request->validate([
            'nom_MP' => 'required',
            'prix_achat' => 'required|numeric',
            'qte_stock' => 'required|numeric',
            'seuil_stock' => 'required|numeric',
            'unite' => 'required',
        ]);

        MatierePremiere::create($request->all());

        return redirect()->route('matieres.index')
            ->with('success', 'Matière première ajoutée avec succès.');
    }

    // Méthode pour afficher les détails d'une matière première spécifique
    public function show($id)
    {
        $matierePremiere = MatierePremiere::findOrFail($id);
        return view('matieres.show', compact('matierePremiere'));
    }

    // Méthode pour afficher le formulaire de modification d'une matière première
    public function edit($id)
    {
        $matierePremiere = MatierePremiere::findOrFail($id);
        return view('matieres.edit', compact('matierePremiere'));
    }

    // Méthode pour mettre à jour une matière première
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_MP' => 'required',
            'prix_achat' => 'required|numeric',
            'qte_stock' => 'required|numeric',
            'seuil_stock' => 'required|numeric',
            'unite' => 'required',
        ]);

        $matierePremiere = MatierePremiere::findOrFail($id);
        $matierePremiere->update($request->all());

        return redirect()->route('matieres.index')
            ->with('success', 'Matière première mise à jour avec succès.');
    }

    // Méthode pour supprimer une matière première
    public function destroy($id)
    {
        $matierePremiere = MatierePremiere::findOrFail($id);
        $matierePremiere->delete();

        return redirect()->route('matieres.index')
            ->with('success', 'Matière première supprimée avec succès.');
    }
}
