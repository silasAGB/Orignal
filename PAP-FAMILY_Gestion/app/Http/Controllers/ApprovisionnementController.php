<?php
namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApprovisionnementController extends Controller
{
    public function index()
    {
        $approvisionnements = Approvisionnement::with('fournisseur')->get();
        return view('boilerplate::approvisionnements.gerer', compact('approvisionnements'));
    }

    public function show($id_approvisionnement)
    {
        $approvisionnement = Approvisionnement::findOrFail($id_approvisionnement);
        return view('boilerplate::approvisionnements.show', compact('approvisionnement'));
    }

    public function create()
    {
        return view('boilerplate::approvisionnements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_approvisionnement' => 'required|date',
            'reference_approvisionnement' => 'required|string|max:255',
            'qte_approvisionnement' => 'required|integer',
            'montant' => 'required|numeric',
            'id_fournisseur' => 'required|exists:fournisseurs,id_fournisseur',
        ]);

        Approvisionnement::create($request->all());

        return redirect()->route('boilerplate.approvisionnements.gerer')->with('success', 'Approvisionnement ajouté avec succès.');
    }


    public function edit($id_approvisionnement)
    {
        $approvisionnement = Approvisionnement::findOrFail($id_approvisionnement);
        $fournisseurs = Fournisseur::all();
        return view('boilerplate::approvisionnements.edit', compact('approvisionnement', 'fournisseurs'));
    }

    public function update(Request $request, $id_approvisionnement)
    {
        $request->validate([
            'date_approvisionnement' => 'required|date',
            'reference_approvisionnement' => 'required|string|max:255',
            'qte_approvisionnement' => 'required|integer',
            'montant' => 'required|numeric',
            'id_fournisseur' => 'required|exists:fournisseurs,id_fournisseur',
            'status' => 'required|string|max:255'
        ]);

        $approvisionnement = Approvisionnement::findOrFail($id_approvisionnement);
        $approvisionnement->update($request->all());

        return redirect()->route('boilerplate.approvisionnements.gerer')
                         ->with('success', 'Approvisionnement mis à jour avec succès.');
    }

    public function destroy($id_approvisionnement)
    {
        $approvisionnement = Approvisionnement::findOrFail($id_approvisionnement);
        $approvisionnement->delete();

        return redirect()->route('boilerplate.approvisionnements.gerer')
                         ->with('success', 'Approvisionnement supprimé avec succès.')
                         ->withHeaders(['Refresh' => '3;url='.route('boilerplate.approvisionnements.gerer')]);
    }

    public function statistiques()
    {
        $now = Carbon::now();

        $approvisionnementsEnAttenteApprobation = Approvisionnement::where('status', 'en attente d\'approbation')->count();
        $approvisionnementsEnAttenteLivraison = Approvisionnement::where('status', 'en attente de livraison')->count();
        $approvisionnementsEffectueCeMois = Approvisionnement::whereMonth('created_at', $now->month)
                                                            ->whereYear('created_at', $now->year)
                                                            ->count();

        return view('boilerplate::approvisionnements.statistiques', compact(
            'approvisionnementsEnAttenteApprobation',
            'approvisionnementsEnAttenteLivraison',
            'approvisionnementsEffectueCeMois'
        ));
    }
}

