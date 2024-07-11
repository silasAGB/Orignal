@extends('boilerplate::layout.index', [
    'title' => 'Créer Approvisionnement',
    'breadcrumb' => ['Créer Approvisionnement']
])

@section('content')
    <form role="form" action="{{ route('boilerplate.approvisionnements.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route('boilerplate.approvisionnements.gerer') }}" class="btn btn-default" data-toggle="tooltip" title="Retour à la liste des approvisionnements">
                    <span class="far fa-arrow-alt-circle-left text-muted"></span>
                </a>
                <span class="btn-group float-right">
                    <button type="submit" class="btn btn-primary">
                        Ajouter
                    </button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @component('boilerplate::card', ['title' => 'Informations Approvisionnement'])
                    <div class="form-group">
                        <label for="date_approvisionnement">Date d'approvisionnement</label>
                        <input type="date" class="form-control" id="date_approvisionnement" name="date_approvisionnement" required>
                    </div>
                    <div class="form-group">
                        <label for="reference_approvisionnement">Référence d'approvisionnement</label>
                        <input type="text" class="form-control" id="reference_approvisionnement" name="reference_approvisionnement" required>
                    </div>
                    <div class="form-group">
                        <label for="qte_approvisionnement">Quantité d'approvisionnement</label>
                        <input type="number" class="form-control" id="qte_approvisionnement" name="qte_approvisionnement" required>
                    </div>
                    <div class="form-group">
                        <label for="montant">Montant</label>
                        <input type="number" step="0.01" class="form-control" id="montant" name="montant" required>
                    </div>
                @endcomponent
            </div>
            <div class="col-lg-6">
                @component('boilerplate::card', ['title' => 'Informations Fournisseur'])
                    <div class="form-group">
                        <label for="id_fournisseur">Fournisseur</label>
                        <select class="form-control" id="id_fournisseur" name="id_fournisseur" required>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id_fournisseur }}">{{ $fournisseur->nom_fournisseur }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                    </div>
                @endcomponent
            </div>
        </div>
    </form>
@endsection
