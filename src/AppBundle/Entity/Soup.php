<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soup
 *
 * @ORM\Table(name="soup")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SoupRepository")
 */
class Soup
{
    /**
     * @var int
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
     * @var float
     *
     * @ORM\Column(name="litr", type="float", nullable=true)
     */
    private $litr;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Soup
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
     * Set litr
     *
     * @param float $litr
     *
     * @return Soup
     */
    public function setLitr($litr)
    {
        $this->litr = $litr;

        return $this;
    }

    /**
     * Get litr
     *
     * @return float
     */
    public function getLitr()
    {
        return $this->litr;
    }

    public function __toString()
    {
        return $this->name. ' l.: '.$this->litr;
    }
}

