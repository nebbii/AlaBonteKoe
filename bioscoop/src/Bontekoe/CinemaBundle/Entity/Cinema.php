<?php

namespace Bontekoe\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cinema
 *
 * @ORM\Table(name="cinemas")
 * @ORM\Entity(repositoryClass="Bontekoe\CinemaBundle\Entity\CinemaRepository")
 */
class Cinema
{
    /**
     * @ORM\OneToMany(targetEntity="Showschema", mappedBy="cinema")
     */
    private $showschema;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="rows", type="integer")
     */
    private $rows;

    /**
     * @var integer
     *
     * @ORM\Column(name="row_seats", type="integer")
     */
    private $rowSeats;


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
     * Set number
     *
     * @param integer $number
     *
     * @return Cinema
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set rows
     *
     * @param integer $rows
     *
     * @return Cinema
     */
    public function setRows($rows)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * Get rows
     *
     * @return integer
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * Set rowSeats
     *
     * @param integer $rowSeats
     *
     * @return Cinema
     */
    public function setRowSeats($rowSeats)
    {
        $this->rowSeats = $rowSeats;

        return $this;
    }

    /**
     * Get rowSeats
     *
     * @return integer
     */
    public function getRowSeats()
    {
        return $this->rowSeats;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shows = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add show
     *
     * @param \Bontekoe\CinemaBundle\Entity\Showschema $show
     *
     * @return Cinema
     */
    public function addShow(\Bontekoe\CinemaBundle\Entity\Showschema $show)
    {
        $this->shows[] = $show;

        return $this;
    }

    /**
     * Remove show
     *
     * @param \Bontekoe\CinemaBundle\Entity\Showschema $show
     */
    public function removeShow(\Bontekoe\CinemaBundle\Entity\Showschema $show)
    {
        $this->shows->removeElement($show);
    }

    /**
     * Get shows
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShows()
    {
        return $this->shows;
    }

    /**
     * Add showschema
     *
     * @param \Bontekoe\CinemaBundle\Entity\Showschema $showschema
     *
     * @return Cinema
     */
    public function addShowschema(\Bontekoe\CinemaBundle\Entity\Showschema $showschema)
    {
        $this->showschema[] = $showschema;

        return $this;
    }

    /**
     * Remove showschema
     *
     * @param \Bontekoe\CinemaBundle\Entity\Showschema $showschema
     */
    public function removeShowschema(\Bontekoe\CinemaBundle\Entity\Showschema $showschema)
    {
        $this->showschema->removeElement($showschema);
    }

    /**
     * Get showschema
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShowschema()
    {
        return $this->showschema;
    }
}
