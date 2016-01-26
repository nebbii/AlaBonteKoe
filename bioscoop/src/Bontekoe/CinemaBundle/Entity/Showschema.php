<?php

namespace Bontekoe\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Showschema
 *
 * @ORM\Table(name="showschema")
 * @ORM\Entity(repositoryClass="Bontekoe\CinemaBundle\Entity\ShowschemaRepository")
 */
class Showschema
{

    /**
     * @var Cinema
     *
     * @ORM\ManyToOne(targetEntity="Cinema", inversedBy="showschema")
     * @ORM\JoinColumn(name="cinema_id", referencedColumnName="id")
     */
    private $cinema;


    /**
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="showschema")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id")
     */
    private $movie;

    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="showschema")
     */
    private $reservation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;


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
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Showschema
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set cinema
     *
     * @param \Bontekoe\CinemaBundle\Entity\Cinema $cinema
     *
     * @return Showschema
     */
    public function setCinema(\Bontekoe\CinemaBundle\Entity\Cinema $cinema = null)
    {
        $this->cinema = $cinema;

        return $this;
    }

    /**
     * Get cinema
     *
     * @return \Bontekoe\CinemaBundle\Entity\Cinema
     */
    public function getCinema()
    {
        return $this->cinema;
    }

    /**
     * Set movie
     *
     * @param \Bontekoe\CinemaBundle\Entity\Movie $movie
     *
     * @return Showschema
     */
    public function setMovie(\Bontekoe\CinemaBundle\Entity\Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \Bontekoe\CinemaBundle\Entity\Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reservation
     *
     * @param \Bontekoe\CinemaBundle\Entity\Reservation $reservation
     *
     * @return Showschema
     */
    public function addReservation(\Bontekoe\CinemaBundle\Entity\Reservation $reservation)
    {
        $this->reservations[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \Bontekoe\CinemaBundle\Entity\Reservation $reservation
     */
    public function removeReservation(\Bontekoe\CinemaBundle\Entity\Reservation $reservation)
    {
        $this->reservations->removeElement($reservation);
    }

    /**
     * Get reservations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Get reservation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}
