<?php

namespace Carnaval\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatagorieLiens
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carnaval\WebsiteBundle\Entity\CatagorieLiensRepository")
 */
class CatagorieLiens
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
     * @ORM\OneToMany(targetEntity="Carnaval\WebsiteBundle\Entity\Liens", mappedBy="liens")
     */
    private $liens;

    public function __construct()
    {
        $this->liens = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set name
     *
     * @param string $name
     * @return CatagorieLiens
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


    /**
     * Add liens
     *
     * @param \Carnaval\WebsiteBundle\Entity\Liens $liens
     * @return CatagorieLiens
     */
    public function addLien(\Carnaval\WebsiteBundle\Entity\Liens $liens)
    {
        $this->liens[] = $liens;
    
        return $this;
    }

    /**
     * Remove liens
     *
     * @param \Carnaval\WebsiteBundle\Entity\Liens $liens
     */
    public function removeLien(\Carnaval\WebsiteBundle\Entity\Liens $liens)
    {
        $this->liens->removeElement($liens);
    }

    /**
     * Get liens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiens()
    {
        return $this->liens;
    }

    public function setLiens($liens)
    {
        return $this->liens = $liens;
        return $this;
    }
}