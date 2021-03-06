<?php

/**
 * namespace de localizacao do nosso controller
 */

namespace Contato\Controller;

// import Zend\Mvc
use Zend\Mvc\Controller\AbstractActionController;
// import Zend\View
use Zend\View\Model\ViewModel;

class ContatosController extends AbstractActionController
{

    protected $contatoTable;

// GET /contatos
    public function indexAction()
    {
        // enviar para view o array com key contatos e value com todos os contatos
        return new ViewModel(array('contatos' => $this->getContatoTable()->fetchAll()));
    }

// GET /contatos/novo
    public function novoAction()
    {
        return new ViewModel();
    }

    // POST /contatos/adicionar
    public function adicionarAction()
    {
        // obtém a requisição
        $request = $this->getRequest();
        \Zend\Debug\Debug::dump($request->getPost());
        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido) {
                // aqui vai a lógica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela adição
                // 2 - inserir dados no banco pelo model
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Contato criado com sucesso");

                // redirecionar para action index no controller contatos
                return $this->redirect()->toRoute('contatos');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao criar contato");

                // redirecionar para action novo no controllers contatos
                return $this->redirect()->toRoute('contatos', array('action' => 'novo'));
            }
        }
    }

    // GET /contatos/detalhes/id
    public function detalhesAction()
    {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para contatos
        if (!$id) {
            // adicionar mensagem
            $this->flashMessenger()->addMessage("Contato não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('contatos');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado
        // formulário com dados preenchidos
//        $form = array(
//            'nome' => 'Igor Rocha',
//            "telefone_principal" => "(085) 8585-8585",
//            "telefone_secundario" => "(085) 8585-8585",
//            "data_criacao" => "02/03/2013",
//            "data_atualizacao" => "02/03/2013",
//        );

        try {
            $form = (array) $this->getContatoTable()->find($id);
        } catch (\Exception $exc) {
            // adicionar mensagem
            $this->flashMessenger()->addErrorMessage($exc->getMessage());

            // redirecionar para action index
            return $this->redirect()->toRoute('contatos');
        }

        // dados eviados para detalhes.phtml
        return array('id' => $id, 'form' => $form);
    }

// GET /contatos/editar/id
    public function editarAction()
    {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para contatos
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addMessage("Contato não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('contatos');
        }

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado
        // formulário com dados preenchidos
//        $form = array(
//            'nome' => 'Igor Rocha',
//            "telefone_principal" => "(085) 8585-8585",
//            "telefone_secundario" => "(085) 8585-8585",
//        );

        try {
            $form = (array) $this->getContatoTable()->find($id);
        } catch (\Exception $exc) {
            // adicionar mensagem
            $this->flashMessenger()->addErrorMessage($exc->getMessage());

            // redirecionar para action index
            return $this->redirect()->toRoute('contatos');
        }

        // dados eviados para editar.phtml
        return array('id' => $id, 'form' => $form);
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

    /**
     * Metodo privado para obter instacia do Model ContatoTable
     *
     * @return \Contato\Model\ContatoTable
     */
    private function getContatoTable()
    {
       if (!$this->contatoTable) {
            $sm = $this->getServiceLocator();
            $this->contatoTable = $sm->get('Contato\Model\ContatosTable');
        }
        return $this->contatoTable;
    }

}
