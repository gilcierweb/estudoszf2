<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProdutosController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

