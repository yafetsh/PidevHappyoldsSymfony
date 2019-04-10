<?php

namespace ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animateur
 *
 * @ORM\Table(name="animateur")
 * @ORM\Entity
 */
class Animateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_animateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_animateur", type="string", length=32, nullable=false)
     */
    private $nomAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_animateur", type="string", length=32, nullable=false)
     */
    private $prenomAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_animateur", type="string", length=32, nullable=false)
     */
    private $mailAnimateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel_animateur", type="integer", nullable=false)
     */
    private $telAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_animateur", type="string", length=255, nullable=false)
     */
    private $adresseAnimateur;

    /**
     * @return int
     */
    public function getIdAnimateur()
    {
        return $this->idAnimateur;
    }

    /**
     * @param int $idAnimateur
     */
    public function setIdAnimateur($idAnimateur)
    {
        $this->idAnimateur = $idAnimateur;
    }

    /**
     * @return string
     */
    public function getNomAnimateur()
    {
        return $this->nomAnimateur;
    }

    /**
     * @param string $nomAnimateur
     */
    public function setNomAnimateur($nomAnimateur)
    {
        $this->nomAnimateur = $nomAnimateur;
    }

    /**
     * @return string
     */
    public function getPrenomAnimateur()
    {
        return $this->prenomAnimateur;
    }

    /**
     * @param string $prenomAnimateur
     */
    public function setPrenomAnimateur($prenomAnimateur)
    {
        $this->prenomAnimateur = $prenomAnimateur;
    }

    /**
     * @return string
     */
    public function getMailAnimateur()
    {
        return $this->mailAnimateur;
    }

    /**
     * @param string $mailAnimateur
     */
    public function setMailAnimateur($mailAnimateur)
    {
        $this->mailAnimateur = $mailAnimateur;
    }

    /**
     * @return int
     */
    public function getTelAnimateur()
    {
        return $this->telAnimateur;
    }

    /**
     * @param int $telAnimateur
     */
    public function setTelAnimateur($telAnimateur)
    {
        $this->telAnimateur = $telAnimateur;
    }

    /**
     * @return string
     */
    public function getAdresseAnimateur()
    {
        return $this->adresseAnimateur;
    }

    /**
     * @param string $adresseAnimateur
     */
    public function setAdresseAnimateur($adresseAnimateur)
    {
        $this->adresseAnimateur = $adresseAnimateur;
    }


}

