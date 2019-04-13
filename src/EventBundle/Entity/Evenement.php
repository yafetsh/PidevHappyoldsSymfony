<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_evenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_d_evenement", type="date", nullable=false)
     */
    private $dateDEvenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_f_evenement", type="date", nullable=false)
     */
    private $dateFEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_evenement", type="string", length=255, nullable=false)
     */
    private $heureEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_evenement", type="string", length=255, nullable=false)
     */
    private $nomEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_evenement", type="string", length=255, nullable=false)
     */
    private $adresseEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="description_evenement", type="string", length=255, nullable=true)
     */
    private $descriptionEvenement;



    /**
     * @return int
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * @param int $idEvenement
     */
    public function setIdEvenement($idEvenement)
    {
        $this->idEvenement = $idEvenement;
    }

    /**
     * @return \DateTime
     */
    public function getDateDEvenement()
    {
        return $this->dateDEvenement;
    }

    /**
     * @param \DateTime $dateDEvenement
     */
    public function setDateDEvenement($dateDEvenement)
    {
        $this->dateDEvenement = $dateDEvenement;
    }

    /**
     * @return \DateTime
     */
    public function getDateFEvenement()
    {
        return $this->dateFEvenement;
    }

    /**
     * @param \DateTime $dateFEvenement
     */
    public function setDateFEvenement($dateFEvenement)
    {
        $this->dateFEvenement = $dateFEvenement;
    }

    /**
     * @return string
     */
    public function getHeureEvenement()
    {
        return $this->heureEvenement;
    }

    /**
     * @param string $heureEvenement
     */
    public function setHeureEvenement($heureEvenement)
    {
        $this->heureEvenement = $heureEvenement;
    }

    /**
     * @return string
     */
    public function getNomEvenement()
    {
        return $this->nomEvenement;
    }

    /**
     * @param string $nomEvenement
     */
    public function setNomEvenement($nomEvenement)
    {
        $this->nomEvenement = $nomEvenement;
    }

    /**
     * @return string
     */
    public function getAdresseEvenement()
    {
        return $this->adresseEvenement;
    }

    /**
     * @param string $adresseEvenement
     */
    public function setAdresseEvenement($adresseEvenement)
    {
        $this->adresseEvenement = $adresseEvenement;
    }

    /**
     * @return string
     */
    public function getDescriptionEvenement()
    {
        return $this->descriptionEvenement;
    }

    /**
     * @param string $descriptionEvenement
     */
    public function setDescriptionEvenement($descriptionEvenement)
    {
        $this->descriptionEvenement = $descriptionEvenement;
    }




}

