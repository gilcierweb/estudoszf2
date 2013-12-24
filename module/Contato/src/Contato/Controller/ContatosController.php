<?php

namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContatosController extends AbstractActionController
{

// GET /contatos
    public function indexAction()
    {
        return new ViewModel();
    }

// GET /contatos/novo
    public function novoAction()
    {
        return new ViewModel();
    }

    // POST /contatos/adicionar
    public function adicionarAction()
    {
        return new ViewModel();
    }

    // GET /contatos/detalhes/id
    public function detalhesAction()
    {
        return new ViewModel();
    }

// GET /contatos/editar/id
    public function editarAction()
    {
        return new ViewModel();
    }

// PUT /contatos/editar/id
    public function atualizarAction()
    {
        return new ViewModel();
    }

// DELETE /contatos/deletar/id
    public function deletarAction()
    {
        return new ViewModel();
    }

}
