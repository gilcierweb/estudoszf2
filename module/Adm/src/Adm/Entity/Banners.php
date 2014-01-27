<?php

namespace Adm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banners
 *
 * @ORM\Table(name="banners")
 * @ORM\Entity
 */
class Banners
{
    /**
     * @var integer
     *
     * @ORM\Column(name="banner_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bannerId;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_titulo", type="string", length=255, nullable=false)
     */
    private $bannerTitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_imagem", type="string", length=100, nullable=false)
     */
    private $bannerImagem;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_link", type="string", length=255, nullable=false)
     */
    private $bannerLink = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="banner_data", type="datetime", nullable=false)
     */
    private $bannerData = 'CURRENT_TIMESTAMP';



    /**
     * Get bannerId
     *
     * @return integer 
     */
    public function getBannerId()
    {
        return $this->bannerId;
    }

    /**
     * Set bannerTitulo
     *
     * @param string $bannerTitulo
     * @return Banners
     */
    public function setBannerTitulo($bannerTitulo)
    {
        $this->bannerTitulo = $bannerTitulo;

        return $this;
    }

    /**
     * Get bannerTitulo
     *
     * @return string 
     */
    public function getBannerTitulo()
    {
        return $this->bannerTitulo;
    }

    /**
     * Set bannerImagem
     *
     * @param string $bannerImagem
     * @return Banners
     */
    public function setBannerImagem($bannerImagem)
    {
        $this->bannerImagem = $bannerImagem;

        return $this;
    }

    /**
     * Get bannerImagem
     *
     * @return string 
     */
    public function getBannerImagem()
    {
        return $this->bannerImagem;
    }

    /**
     * Set bannerLink
     *
     * @param string $bannerLink
     * @return Banners
     */
    public function setBannerLink($bannerLink)
    {
        $this->bannerLink = $bannerLink;

        return $this;
    }

    /**
     * Get bannerLink
     *
     * @return string 
     */
    public function getBannerLink()
    {
        return $this->bannerLink;
    }

    /**
     * Set bannerData
     *
     * @param \DateTime $bannerData
     * @return Banners
     */
    public function setBannerData($bannerData)
    {
        $this->bannerData = $bannerData;

        return $this;
    }

    /**
     * Get bannerData
     *
     * @return \DateTime 
     */
    public function getBannerData()
    {
        return $this->bannerData;
    }
}
