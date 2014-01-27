<?php

namespace Adm\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

class SubcategoriasController extends AbstractController
{

    public function __construct()
    {
        $this->form = 'Adm\Form\CategoriaForm';
        $this->controller = 'Subcategorias';
        $this->route = 'adm/subcategorias';
        $this->service = 'Adm\Service\Subcategorias';
        $this->entity = 'Adm\Entity\Subcategorias';
    }

//    public function addAction()
//    {
//        return new ViewModel();
//    }
//
//    public function editAction()
//    {
//        return new ViewModel();
//    }
//
//    public function deleteAction()
//    {
//        return new ViewModel();
//    }

}
