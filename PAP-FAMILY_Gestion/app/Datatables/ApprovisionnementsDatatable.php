<?php
namespace App\Datatables;

use App\Models\Approvisionnement;
use Sebastienheyd\Boilerplate\Datatables\Button;
use Sebastienheyd\Boilerplate\Datatables\Column;
use Sebastienheyd\Boilerplate\Datatables\Datatable;

class ApprovisionnementsDatatable extends Datatable
{
    public $slug = 'approvisionnements';

    public function datasource()
    {
       //return Approvisionnement::query();
       return Approvisionnement::with('fournisseur')->select([
        'id_approvisionnement',
        'date_approvisionnement',
        'reference_approvisionnement',
        'qte_approvisionnement',
        'montant',
        'id_fournisseur',
        'status',
        'created_at',
        'updated_at']);
    }

    public function setUp()
    {
        $this->order('id_approvisionnement  ', 'desc');
        $this->buttons('filters', 'csv', 'refresh', 'print');
    }

    public function columns(): array
    {
        return [
            Column::add(__('Id Approvisionnement'))
                ->data('id_approvisionnement'),

            Column::add(__('Date Approvisionnement'))
                ->width('180px')
                ->data('date_approvisionnement')
                ->dateFormat(__("boilerplate::date.Ymd")),

            Column::add(__('Reference Approvisionnement'))
                ->data('reference_approvisionnement'),

            Column::add(__('Qte Approvisionnement'))
                ->data('qte_approvisionnement'),

            Column::add(__('Montant'))
                ->data('montant'),

            Column::add(__('Fournisseur'))
                ->data('fournisseur.nom_fournisseur'),

            Column::add(__('Status'))
                ->data('status'),

            Column::add(__('Created At'))
                ->width('180px')
                ->data('created_at')
                ->dateFormat(),

            Column::add(__('Updated At'))
                ->width('180px')
                ->data('updated_at')
                ->dateFormat(),

            Column::add()
                ->width('20px')
                ->actions(function (Approvisionnement $approvisionnement) {
                    return join([
                        Button::show('boilerplate.approvisionnements.show', $approvisionnement),
                        Button::edit('boilerplate.approvisionnements.edit', $approvisionnement),
                        Button::delete('boilerplate.approvisionnements.destroy', $approvisionnement),
                    ]);
                }),
        ];
    }
}
