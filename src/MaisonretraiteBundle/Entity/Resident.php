<?php

namespace MaisonretraiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resident
 *
 * @ORM\Table(name="resident", indexes={@ORM\Index(name="id_maison", columns={"id_maison"})})
 * @ORM\Entity
 */
class Resident
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_resident", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResident;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_resident", type="string", length=20, nullable=false)
     */
    private $nomResident;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_resident", type="string", length=20, nullable=false)
     */
    private $prenomResident;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_resident", type="integer", nullable=false)
     */
    private $ageResident;

    /**
     * @var integer
     *
     * @ORM\Column(name="alzheimer_resident", type="integer", nullable=false)
     */
    private $alzheimerResident;

    /**
     * @var string
     *
     * @ORM\Column(name="maladie_resident", type="string", length=255, nullable=false)
     */
    private $maladieResident;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=255, nullable=false)
     */
    private $responsable;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone_responsable", type="integer", nullable=false)
     */
    private $telephoneResponsable;

    /**
     * @var \Maison
     *
     * @ORM\ManyToOne(targetEntity="Maison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_maison", referencedColumnName="id_maison")
     * })
     */
    private $idMaison;

    /**
     * @return int
     */
    public function getIdResident()
    {
        return $this->idResident;
    }

    /**
     * @param int $idResident
     */
    public function setIdResident($idResident)
    {
        $this->idResident = $idResident;
    }

    /**
     * @return string
     */
    public function getNomResident()
    {
        return $this->nomResident;
    }

    /**
     * @param string $nomResident
     */
    public function setNomResident($nomResident)
    {
        $this->nomResident = $nomResident;
    }

    /**
     * @return string
     */
    public function getPrenomResident()
    {
        return $this->prenomResident;
    }

    /**
     * @param string $prenomResident
     */
    public function setPrenomResident($prenomResident)
    {
        $this->prenomResident = $prenomResident;
    }

    /**
     * @return int
     */
    public function getAgeResident()
    {
        return $this->ageResident;
    }

    /**
     * @param int $ageResident
     */
    public function setAgeResident($ageResident)
    {
        $this->ageResident = $ageResident;
    }

    /**
     * @return int
     */
    public function getAlzheimerResident()
    {
        return $this->alzheimerResident;
    }

    /**
     * @param int $alzheimerResident
     */
    public function setAlzheimerResident($alzheimerResident)
    {
        $this->alzheimerResident = $alzheimerResident;
    }

    /**
     * @return string
     */
    public function getMaladieResident()
    {
        return $this->maladieResident;
    }

    /**
     * @param string $maladieResident
     */
    public function setMaladieResident($maladieResident)
    {
        $this->maladieResident = $maladieResident;
    }

    /**
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param string $responsable
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    /**
     * @return int
     */
    public function getTelephoneResponsable()
    {
        return $this->telephoneResponsable;
    }

    /**
     * @param int $telephoneResponsable
     */
    public function setTelephoneResponsable($telephoneResponsable)
    {
        $this->telephoneResponsable = $telephoneResponsable;
    }

    /**
     * @return \Maison
     */
    public function getIdMaison()
    {
        return $this->idMaison;
    }

    /**
     * @param \Maison $idMaison
     */
    public function setIdMaison($idMaison)
    {
        $this->idMaison = $idMaison;
    }


}

