<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BannersController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        echo $id = (int) $this->params()->fromRoute('id', 0);
        return new ViewModel();
    }

    public function deleteAction()
    {
        echo $id = (int) $this->params()->fromRoute('id', 0);
        return new ViewModel();
    }

}
