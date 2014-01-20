<?php

namespace Base\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;

/*
 * Class AbstractEntity
 * @package Base\Entity
 */

abstract class AbstractEntity
{
    /*
     * @param Array $options
     */

    public function __construct(Array $options = array())
    {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
    }

    /*
     * @return Array
     */

    public function toArray()
    {
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }

}
