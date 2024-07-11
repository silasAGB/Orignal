@extends('boilerplate::layout.index', [
    'title' => 'Modifier approvisionnement',
    'breadcrumb' => ['Modifier Approvisionnement']
])

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form role="form" action="{{ route('boilerplate.approvisionnements.update', $approvisionnement->id_approvisionnement) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date_approvisionnement">Date Approvisionnement</label>
                        <input type="date" class="form-control" id="date_approvisionnement" name="date_approvisionnement" value="{{ $approvisionnement->date_approvisionnement }}" required>
                    </div>
                    <div class="form-group">
                        <label for="reference_approvisionnement">Référence Approvisionnement</label>
                        <input type="text" class="form-control" id="reference_approvisionnement" name="reference_approvisionnement" value="{{ $approvisionnement->reference_approvisionnement }}" required>
                    </div>
                    <div class="form-group">
                        <label for="qte_approvisionnement">Quantité Approvisionnement</label>
                        <input type="number" class="form-control" id="qte_approvisionnement" name="qte_approvisionnement" value="{{ $approvisionnement->qte_approvisionnement }}" required>
                    </div>
                    <div class="form-group">
                        <label for="montant">Montant</label>
                        <input type="number" class="form-control" id="montant" name="montant" value="{{ $approvisionnement->montant }}" required>
                    </div>
                    <div class="form-group">
                        <label for="id_fournisseur">Fournisseur</label>
                        <select class="form-control" id="id_fournisseur" name="id_fournisseur" required>
                            @foreach($fournisseurs as $fournisseur)
                            <option value="{{ $fournisseur->id_fournisseur }}" {{ $fournisseur->id_fournisseur == $approvisionnement->id_fournisseur ? 'selected' : '' }}>
                                {{ $fournisseur->nom_fournisseur }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="en attente d'approbation" {{ $approvisionnement->status == 'en attente d\'approbation' ? 'selected' : '' }}>En attente d'approbation</option>
                            <option value="en attente de livraison" {{ $approvisionnement->status == 'en attente de livraison' ? 'selected' : '' }}>En attente de livraison</option>
                            <option value="livré" {{ $approvisionnement->status == 'livré' ? 'selected' : '' }}>Livré</option>
                            <option value="annulé" {{ $approvisionnement->status == 'annulé' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <a href="{{ route("boilerplate.approvisionnements.gerer") }}" class="btn btn-default" data-toggle="tooltip" title="Retour à la liste des approvisionnements">
                            <span class="far fa-arrow-alt-circle-left text-muted"></span>
                        </a>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
