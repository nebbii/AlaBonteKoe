<?php

namespace Bontekoe\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Movie
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity(repositoryClass="Bontekoe\CinemaBundle\Entity\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\OneToMany(targetEntity="Showschema", mappedBy="movie")
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publication_date", type="date")
     */
    private $publicationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre;

    /**
     * @var integer
     *
     * @ORM\Column(name="runtime", type="integer")
     */
    private $runtime;

    /**
     * @var string
     *
     * @ORM\Column(name="productioncompany", type="string", length=255)
     */
    private $productioncompany;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * Set title
     *
     * @param string $title
     *
     * @return Movie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     *
     * @return Movie
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Movie
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set runtime
     *
     * @param integer $runtime
     *
     * @return Movie
     */
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;

        return $this;
    }

    /**
     * Get runtime
     *
     * @return integer
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * Set productioncompany
     *
     * @param string $productioncompany
     *
     * @return Movie
     */
    public function setProductioncompany($productioncompany)
    {
        $this->productioncompany = $productioncompany;

        return $this;
    }

    /**
     * Get productioncompany
     *
     * @return string
     */
    public function getProductioncompany()
    {
        return $this->productioncompany;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Movie
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
     * @return Movie
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
     * @return Movie
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
