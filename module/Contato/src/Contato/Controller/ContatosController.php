<?php

namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContatosController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

