<?php
/**
 * This file is part of webportal plugin for FacturaScripts.
 * Copyright (C) 2018 Carlos Garcia Gomez  <carlos@facturascripts.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace FacturaScripts\Plugins\webportal\Controller;

use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Core\Lib\ExtendedController;

/**
 * Description of EditWebCluster
 *
 * @author Carlos García Gómez
 */
class EditWebCluster extends ExtendedController\PanelController
{

    /**
     * Returns basic page attributes
     *
     * @return array
     */
    public function getPageData()
    {
        $pageData = parent::getPageData();
        $pageData['title'] = 'cluster';
        $pageData['menu'] = 'web';
        $pageData['showonmenu'] = false;
        $pageData['icon'] = 'fa-newspaper-o';

        return $pageData;
    }

    /**
     * Load views
     */
    protected function createViews()
    {
        $this->addEditView('EditWebCluster', 'WebCluster', 'cluster', 'fa-newspaper-o');
        $this->addListView('ListWebPage', 'WebPage', 'pages', 'fa-globe');
    }

    /**
     * Load data view procedure
     *
     * @param string $keyView
     * @param ExtendedController\BaseView $view
     */
    protected function loadData($keyView, $view)
    {
        switch ($keyView) {
            case 'EditWebCluster':
                $code = $this->request->get('code');
                $view->loadData($code);
                break;

            case 'ListWebPage':
                $idpage = $this->getViewModelValue('EditWebCluster', 'idcluster');
                $view->loadData(false, [new DataBaseWhere('idcluster', $idpage)]);
                break;
        }
    }
}
