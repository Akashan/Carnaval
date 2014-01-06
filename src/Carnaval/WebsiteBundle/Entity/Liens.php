<?php

namespace Carnaval\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liens
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carnaval\WebsiteBundle\Entity\LiensRepository")
 */
class Liens
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text")
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="Carnaval\WebsiteBundle\Entity\CatagorieLiens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Liens
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Liens
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Liens
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set categorie
     *
     * @param \Carnaval\WebsiteBundle\Entity\CatagorieLiens $categorie
     * @return Liens
     */
    public function setCategorie(\Carnaval\WebsiteBundle\Entity\CatagorieLiens $categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Carnaval\WebsiteBundle\Entity\CatagorieLiens
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Liens
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}