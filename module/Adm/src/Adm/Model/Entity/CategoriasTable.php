<?php

namespace Adm\Model\Entity;

use Zend\Db\TableGateway\TableGateway;

class CategoriasTable
{
     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getFindId($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('categoria_id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveCategoria(Categoria $categoria)
     {
         $data = array(
             'categoria_nome' => $categoria->categoria_nome,
             'categoria_descricao'  => $categoria->categoria_descricao,
         );

         $id = (int) $categoria->categoria_id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCategoria($id)) {
                 $this->tableGateway->update($data, array('categoria_id' => $id));
             } else {
                 throw new \Exception('Categoria id does not exist');
             }
         }
     }

     public function deleteCategoria($id)
     {
         $this->tableGateway->delete(array('categoria_id' => (int) $id));
     }
}
