<?php

namespace Bontekoe\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Reservation
 *
 * @ORM\Table(name="reservations")
 * @ORM\Entity(repositoryClass="Bontekoe\CinemaBundle\Entity\ReservationRepository")
 */
class Reservation
{

    /**
     * @ORM\ManyToOne(targetEntity="Showschema", inversedBy="reservation")
     */
    private $showschema;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservation")
     */
    private $user;

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
     * @ORM\Column(name="row", type="integer")
     */
    private $row;

    /**
     * @var integer
     *
     * @ORM\Column(name="row_seat", type="integer")
     */
    private $rowSeat;

    /**
     * @var integer
     *
     * @ORM\Column(name="paid", type="smallint")
     */
    private $paid = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type = "Adult";


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
     * Set row
     *
     * @param integer $row
     *
     * @return Reservation
     */
    public function setRow($row)
    {
        $this->row = $row;

        return $this;
    }

    /**
     * Get row
     *
     * @return integer
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Set rowSeat
     *
     * @param integer $rowSeat
     *
     * @return Reservation
     */
    public function setRowSeat($rowSeat)
    {
        $this->rowSeat = $rowSeat;

        return $this;
    }

    /**
     * Get rowSeat
     *
     * @return integer
     */
    public function getRowSeat()
    {
        return $this->rowSeat;
    }

    /**
     * Set paid
     *
     * @param integer $paid
     *
     * @return Reservation
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return integer
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Reservation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shows = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add show
     *
     * @param \Bontekoe\CinemaBundle\Entity\Showschema $show
     *
     * @return Reservation
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
     * Add user
     *
     * @param \Bontekoe\CinemaBundle\Entity\User $user
     *
     * @return Reservation
     */
    public function addUser(\Bontekoe\CinemaBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Bontekoe\CinemaBundle\Entity\User $user
     */
    public function removeUser(\Bontekoe\CinemaBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set shows
     *
     * @param \Bontekoe\CinemaBundle\Entity\Showschema $shows
     *
     * @return Reservation
     */
    public function setShows(\Bontekoe\CinemaBundle\Entity\Showschema $shows = null)
    {
        $this->shows = $shows;

        return $this;
    }

    /**
     * Set user
     *
     * @param \Bontekoe\CinemaBundle\Entity\User $user
     *
     * @return Reservation
     */
    public function setUser(\Bontekoe\CinemaBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Set showschema
     *
     * @param \Bontekoe\CinemaBundle\Entity\Showschema $showschema
     *
     * @return Reservation
     */
    public function setShowschema(\Bontekoe\CinemaBundle\Entity\Showschema $showschema = null)
    {
        $this->showschema = $showschema;

        return $this;
    }

    /**
     * Get showschema
     *
     * @return \Bontekoe\CinemaBundle\Entity\Showschema
     */
    public function getShowschema()
    {
        return $this->showschema;
    }
}
