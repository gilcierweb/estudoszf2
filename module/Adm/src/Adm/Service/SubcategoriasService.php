<?php

namespace Adm\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class SubcategoriasService extends AbstractService
{

    public function __construct(EntityManager $em)
    {
        $this->entity='Adm\Entity\Subcategotias';
        parent::__construct($em);
    }

}
