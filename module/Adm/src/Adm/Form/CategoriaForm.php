<?php

namespace Adm\Form;

use Zend\Form\Form,
    Zend\Form\Element\Text,
    Zend\Form\Element\Textarea,
    Zend\Form\Element\Submit;
use Adm\Form\CategoriaFilter;

class CategoriaForm
{

    function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new CategoriaFilter());

        $categoria_nome = new Text('categoria_nome');
        $categoria_nome->setLabel('Nome')
                ->setAttributes(array(
                    'maxlength' => 100
        ));
        $this->add($categoria_nome);

        $categoria_descricao = new Textarea('categoria_descricao');
        $categoria_descricao->setLabel('Descrição');
        $this->add($categoria_descricao);

        $submit = new Submit('btn');
        $submit->setValue('Salvar')
                ->setAttributes(array(
                    'class' => 'btn'
        ));
        $this->add($submit);
    }

}
