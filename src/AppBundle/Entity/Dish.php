<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dish
 *
 * @ORM\Table(name="dish")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DishRepository")
 */
class Dish
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var Soup
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Soup")
     * @ORM\JoinColumn(name="soup_id", fieldName="id")
     */
    private $soup;

    /**
     * Dish constructor.
     */
    public function __construct()
    {
        $this->date = new \DateTime();
    }


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Dish
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set soup
     *
     * @param \stdClass $soup
     *
     * @return Dish
     */
    public function setSoup($soup)
    {
        $this->soup = $soup;

        return $this;
    }

    /**
     * @return Soup
     *
     * @return \stdClass
     */
    public function getSoup()
    {
        return $this->soup;
    }
}

