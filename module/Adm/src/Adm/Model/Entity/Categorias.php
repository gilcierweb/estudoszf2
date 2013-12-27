<?php
 namespace Adm\Model\Entity;

 class Categorias
 {
     public $categoria_id;
     public $categoria_nome;
     public $categoria_descricao;

     public function exchangeArray($data)
     {
         $this->categoria_id     = (!empty($data['categoria_id'])) ? $data['categoria_id'] : null;
         $this->categoria_nome = (!empty($data['categoria_nome'])) ? $data['categoria_nome'] : null;
         $this->categoria_descricao  = (!empty($data['categoria_descricao'])) ? $data['categoria_descricao'] : null;
     }
 }

