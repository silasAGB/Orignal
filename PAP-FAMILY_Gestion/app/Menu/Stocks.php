<?php

namespace App\Menu;

use Sebastienheyd\Boilerplate\Menu\Builder;
use Sebastienheyd\Boilerplate\Menu\MenuItemInterface;

class Stocks implements MenuItemInterface
{
    public function make(Builder $menu)
    {
        $item = $menu->add('Stocks', [
            'permission' => 'backend',
            'active' => 'boilerplate.stocks.*',
            'icon' => 'fa fa-archive',
            'order' => '4'

        ]);

        $item->add('matieres premiers', [
            'permission' => 'backend',
            'active' => 'boilerplate.stocks.matierespremieres',
            'route' => 'boilerplate.matierepremieres.index',
        ]);

        $item->add('Produits', [
            'permission' => 'backend',
            'active' => 'boilerplate.stocks.produits',
            'route' => 'boilerplate.stocks.produits',
        ]);

    }
}
