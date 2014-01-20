<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;

abstract class AbstractController extends AbstractActionController
{

    protected $em;
    protected $entity;
    protected $controller;
    protected $route;
    protected $service;
    protected $form;

    abstract function __construct();
    /*
     * Lista resultados
     * @return array|void
     */

    public function indexAction()
    {
        $list = $this->getEm()->getRepository($this->entity)->findAll();
        $page = $this->params()->fromRoute('page');
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                ->setDefaultItemCountPerPage(10);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    /*
     * Adiciona novo registro
     */

    public function addAction()
    {
        if (is_string($this->form)) {
            $form = new $this->form;
        } else {
            $form = $this->form;
        }
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid) {
                $service = $this->getServiceLocator()->get($this->service);
                if ($service->save($request->getPost()->toArray())) {
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                } else {
                    $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar! Tente mais tarde.');
                }
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages())
            );
        }

        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages())
            );
        }

        $this->flashMessenger()->clearMessages(); //Limpar as mensagens

        return new ViewModel(array('form' => $form));
    }

    /*
     * Edita um registro
     */

    public function editAction()
    {
        if (is_string($this->form)) {
            $form = new $this->form;
        } else {
            $form = $this->form;
        }
        $request = $this->getRequest();
        $id = (int) $this->params()->fromRoute('id', 0);

        $repository = $this->getEm()->getRepository($this->entity)->find($id);
        if ($repository) {

            $array = array(); //tratamento para doctrine que converte campo data para datetime, convertemos para string 
            foreach ($repository->toArray() as $key => $value) {
                if ($value instanceof \DateTime) {
                    $array[$key] = $value->format('d/m/Y');
                } else {
                    $array[$key] = $value;
                }
            }

            $form->setData($array);

            if ($request->isPost()) {
                $form->setData($request->getPost());
                if ($form->isValid) {

                    $service = $this->getServiceLocator()->get($this->service);

                    $data = $request->getPost()->toArray();
                    $data['id'] = (int) $id;

                    if ($service->save($data)) {
                        $this->flashMessenger()->addSuccessMessage('Atualizado com sucesso!');
                    } else {
                        $this->flashMessenger()->addErrorMessage('Não foi possivel Atualizar! Tente mais tarde.');
                    }
                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
                }
            }
        } else {
            $this->flashMessenger()->addInfoMessage('Registro não encontrado!');
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }

        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $id)
            );
        }

        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages(),
                'id' => $id)
            );
        }

        if ($this->flashMessenger()->hasInfoMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'warning' => $this->flashMessenger()->getInfoMessages(),
                'id' => $id)
            );
        }

        $this->flashMessenger()->clearMessages(); //Limpar as mensagens

        return new ViewModel(array('form' => $form, 'id' => $id));
    }

    /*
     * Deleta um registro
     */

    public function deleteAction()
    {
        $service = $this->getServiceLocator()->get($this->service);
        $id = (int) $this->params()->fromRoute('id', 0);

        if ($service->remove(array('id' => $id))) {
            $this->flashMessenger()->addSuccessMessage('Registro deletado com sucesso!');
        } else {
            $this->flashMessenger()->addErrorMessage('Não foi possivel deletar o registro!');
        }

        $this->flashMessenger()->clearMessages(); //Limpar as mensagens

        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
    }

    /*
     * @return |Doctrine\ORM\EntityManager
     */

    public function getEm()
    {
        if ($this->em == null) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

}
