<?php

namespace Adm\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategorias
 *
 * @ORM\Table(name="subcategorias")
 * @ORM\Entity
 */
class Subcategorias extends AbstractEntity
{

    /**
     * @var integer
     *
     * @ORM\Column(name="sub_cat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subCatId;

    /**
     * @var integer
     *
     * @ORM\Column(name="categoria_id", type="integer", nullable=false)
     */
    private $categoriaId;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_cat_nome", type="string", length=100, nullable=false)
     */
    private $subCatNome;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_cat_descricao", type="text", nullable=true)
     */
    private $subCatDescricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sub_cat_data", type="datetime", nullable=false)
     */
    private $subCatData = 'CURRENT_TIMESTAMP';

    /**
     * Get subCatId
     *
     * @return integer 
     */
    public function getSubCatId()
    {
        return $this->subCatId;
    }

    /**
     * Set categoriaId
     *
     * @param integer $categoriaId
     * @return Subcategorias
     */
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;

        return $this;
    }

    /**
     * Get categoriaId
     *
     * @return integer 
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * Set subCatNome
     *
     * @param string $subCatNome
     * @return Subcategorias
     */
    public function setSubCatNome($subCatNome)
    {
        $this->subCatNome = $subCatNome;

        return $this;
    }

    /**
     * Get subCatNome
     *
     * @return string 
     */
    public function getSubCatNome()
    {
        return $this->subCatNome;
    }

    /**
     * Set subCatDescricao
     *
     * @param string $subCatDescricao
     * @return Subcategorias
     */
    public function setSubCatDescricao($subCatDescricao)
    {
        $this->subCatDescricao = $subCatDescricao;

        return $this;
    }

    /**
     * Get subCatDescricao
     *
     * @return string 
     */
    public function getSubCatDescricao()
    {
        return $this->subCatDescricao;
    }

    /**
     * Set subCatData
     *
     * @param \DateTime $subCatData
     * @return Subcategorias
     */
    public function setSubCatData($subCatData)
    {
        $this->subCatData = $subCatData;

        return $this;
    }

    /**
     * Get subCatData
     *
     * @return \DateTime 
     */
    public function getSubCatData()
    {
        return $this->subCatData;
    }

}
