<?php

namespace Site\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriesProducts
 */
class CategoriesProducts
{
    /**
     * @var integer
     */
    private $categoriesId;

    /**
     * @var integer
     */
    private $productsId;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set categoriesId
     *
     * @param integer $categoriesId
     * @return CategoriesProducts
     */
    public function setCategoriesId($categoriesId)
    {
        $this->categoriesId = $categoriesId;

        return $this;
    }

    /**
     * Get categoriesId
     *
     * @return integer 
     */
    public function getCategoriesId()
    {
        return $this->categoriesId;
    }

    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return CategoriesProducts
     */
    public function setProductsId($productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get productsId
     *
     * @return integer 
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
