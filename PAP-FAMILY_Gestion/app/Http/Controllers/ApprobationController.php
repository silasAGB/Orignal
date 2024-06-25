<?php

namespace App\Http\Controllers;

use App\Models\Approbation;
use Illuminate\Http\Request;
use App\Models\Approvisionnement;
use App\Models\Production;

class ApprobationController extends Controller
{
    public function index(){
        $approbation = Approbation::where('status','attente')->get();
        return view('approbation.index', compact('Approbation'));
    }

    public function approuvé($id)
    {
        $approbation = Approbation::findOrFail($id);
        $approbation->status = 'approuvé';
        $approbation->save();

        if ($approbation->type === 'production') {
            $production = Production::findOrFail($approbation->model_id);
            $production->status = 'approuvé';
            $production->save();
        } elseif ($approbation->type === 'approvisionnement') {
            $approvisionnement = Approvisionnement::findOrFail($approbation->model_id);
            $approvisionnement->status = 'approuvé';
            $approvisionnement->save();
        }

        return redirect()->route('approbation.index')->with('success', 'L\'approbation a été approuvée avec succès.');

    }

    public function rejeté($id)
    {
        $approbation = Approbation::findOrFail($id);
        $approbation->status = 'rejecté';
        $approbation->save();

        if ($approbation->type === 'production') {
            $production = Production::findOrFail($approbation->model_id);
            $production->status = 'rejecté';
            $production->save();
        } elseif ($approbation->type === 'approvisionnement') {
            $approvisionnement = Approvisionnement::findOrFail($approbation->model_id);
            $approvisionnement->status = 'rejecté';
            $approvisionnement->save();
        }

        return redirect()->route('approbation.index')->with('success', 'L\'approbation a été rejetée avec succès.');
    }
}
