<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoriasController extends AbstractActionController
{

    protected $categoriaTable;

    public function indexAction()
    {
                \Zend\Debug\Debug::dump($this->getCategoriaTable()->fetchAll());
        return new ViewModel(array(
             'categorias' => $this->getCategoriaTable()->fetchAll(),
         ));
    }

    public function getCategoriaTable()
    {
        if (!$this->categoriaTable) {
            $sm = $this->getServiceLocator();
            $this->categoriaTable = $sm->get('Adm\Model\Entity\CategoriasTable');
        }
        return $this->categoriaTable;
    }

}
