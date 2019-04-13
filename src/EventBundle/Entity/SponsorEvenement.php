<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SponsorEvenement
 *
 * @ORM\Table(name="sponsor_evenement", indexes={@ORM\Index(name="IDX_2ED122F0FD02F13", columns={"evenement_id"})})
 * @ORM\Entity
 */
class SponsorEvenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sponsor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSponsor;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_sponsor", type="string", length=55, nullable=false)
     */
    private $nomSponsor;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_sponsor", type="string", length=55, nullable=false)
     */
    private $prenomSponsor;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_sponsor", type="string", length=55, nullable=false)
     */
    private $adresseSponsor;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_sponsor", type="string", length=55, nullable=false)
     */
    private $telSponsor;

    /**
     * @var string
     *
     * @ORM\Column(name="description_sponsoring", type="string", length=55, nullable=false)
     */
    private $descriptionSponsoring;

    /**
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumn(name="evenement_id", referencedColumnName="id_evenement")
     */
    private $evenementId;

    /**
     * @return int
     */
    public function getIdSponsor()
    {
        return $this->idSponsor;
    }

    /**
     * @param int $idSponsor
     */
    public function setIdSponsor($idSponsor)
    {
        $this->idSponsor = $idSponsor;
    }

    /**
     * @return string
     */
    public function getNomSponsor()
    {
        return $this->nomSponsor;
    }

    /**
     * @param string $nomSponsor
     */
    public function setNomSponsor($nomSponsor)
    {
        $this->nomSponsor = $nomSponsor;
    }

    /**
     * @return string
     */
    public function getPrenomSponsor()
    {
        return $this->prenomSponsor;
    }

    /**
     * @param string $prenomSponsor
     */
    public function setPrenomSponsor($prenomSponsor)
    {
        $this->prenomSponsor = $prenomSponsor;
    }

    /**
     * @return string
     */
    public function getAdresseSponsor()
    {
        return $this->adresseSponsor;
    }

    /**
     * @param string $adresseSponsor
     */
    public function setAdresseSponsor($adresseSponsor)
    {
        $this->adresseSponsor = $adresseSponsor;
    }

    /**
     * @return string
     */
    public function getTelSponsor()
    {
        return $this->telSponsor;
    }

    /**
     * @param string $telSponsor
     */
    public function setTelSponsor($telSponsor)
    {
        $this->telSponsor = $telSponsor;
    }

    /**
     * @return string
     */
    public function getDescriptionSponsoring()
    {
        return $this->descriptionSponsoring;
    }

    /**
     * @param string $descriptionSponsoring
     */
    public function setDescriptionSponsoring($descriptionSponsoring)
    {
        $this->descriptionSponsoring = $descriptionSponsoring;
    }

    /**
     * @return mixed
     */
    public function getEvenementId()
    {
        return $this->evenementId;
    }

    /**
     * @param mixed $evenementId
     */
    public function setEvenementId($evenementId)
    {
        $this->evenementId = $evenementId;
    }




}

