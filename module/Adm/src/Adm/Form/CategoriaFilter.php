<?php

namespace Adm\Form;

use Zend\InputFilter\Input,
    Zend\InputFilter\InputFilter;
use Zend\Filter\StringTrim,
    Zend\Filter\StripTags;
use Zend\Validator\NotEmpty;

class CategoriaFilter extends InputFilter
{

    function __construct()
    {
        $categoria_nome = new Input('categoria_nome');
        $categoria_nome->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());

        $categoria_nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($categoria_nome);

        $categoria_descricao = new Input('categoria_descricao');
        $categoria_descricao->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());

        $categoria_descricao->getValidatorChain()->attach(new NotEmpty());
        $this->add($categoria_descricao);
    }

}
