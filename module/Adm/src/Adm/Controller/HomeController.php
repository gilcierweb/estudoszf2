<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Adm\Model\Entity\Produto;

class HomeController extends AbstractActionController
{

    public function indexAction()
    {
//        $produto = new Produto();
//        \Zend\Debug\Debug::dump($produto->fetchAll());
//        die('gilcier');
        return new ViewModel();
    }

    public function testeAction()
    {

        return new ViewModel(array(
            'rows' => $produto->fetchAll(),
        ));
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        return new ViewModel();
    }

}
