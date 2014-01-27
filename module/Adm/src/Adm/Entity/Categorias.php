<?php

namespace Adm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity
 */
class Categorias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="categoria_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoriaId;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria_nome", type="string", length=100, nullable=false)
     */
    private $categoriaNome;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria_descricao", type="text", nullable=true)
     */
    private $categoriaDescricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="categoria_data", type="datetime", nullable=false)
     */
    private $categoriaData = 'CURRENT_TIMESTAMP';



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
     * Set categoriaNome
     *
     * @param string $categoriaNome
     * @return Categorias
     */
    public function setCategoriaNome($categoriaNome)
    {
        $this->categoriaNome = $categoriaNome;

        return $this;
    }

    /**
     * Get categoriaNome
     *
     * @return string 
     */
    public function getCategoriaNome()
    {
        return $this->categoriaNome;
    }

    /**
     * Set categoriaDescricao
     *
     * @param string $categoriaDescricao
     * @return Categorias
     */
    public function setCategoriaDescricao($categoriaDescricao)
    {
        $this->categoriaDescricao = $categoriaDescricao;

        return $this;
    }

    /**
     * Get categoriaDescricao
     *
     * @return string 
     */
    public function getCategoriaDescricao()
    {
        return $this->categoriaDescricao;
    }

    /**
     * Set categoriaData
     *
     * @param \DateTime $categoriaData
     * @return Categorias
     */
    public function setCategoriaData($categoriaData)
    {
        $this->categoriaData = $categoriaData;

        return $this;
    }

    /**
     * Get categoriaData
     *
     * @return \DateTime 
     */
    public function getCategoriaData()
    {
        return $this->categoriaData;
    }
}
