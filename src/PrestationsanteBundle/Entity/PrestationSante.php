<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrestationSante
 *
 * @ORM\Table(name="prestation_sante", indexes={@ORM\Index(name="id_fiche", columns={"id_fiche"}), @ORM\Index(name="id_resident", columns={"id_resident"}), @ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_user_2", columns={"id_user"})})
 * @ORM\Entity
 */
class PrestationSante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_prestation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPrestation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_resident", type="string", length=255, nullable=false)
     */
    private $nomResident;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_resident", type="string", length=255, nullable=false)
     */
    private $prenomResident;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=255, nullable=false)
     */
    private $nomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_user", type="string", length=255, nullable=false)
     */
    private $prenomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="medicaments", type="string", length=20000, nullable=false)
     */
    private $medicaments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \FicheMedicale
     *
     * @ORM\ManyToOne(targetEntity="FicheMedicale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_fiche", referencedColumnName="id_fiche")
     * })
     */
    private $idFiche;

    /**
     * @var \Resident
     *
     * @ORM\ManyToOne(targetEntity="MaisonretraiteBundle\Entity\Resident")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resident", referencedColumnName="id_resident")
     * })
     */
    private $idResident;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @return int
     */
    public function getIdPrestation()
    {
        return $this->idPrestation;
    }

    /**
     * @param int $idPrestation
     */
    public function setIdPrestation($idPrestation)
    {
        $this->idPrestation = $idPrestation;
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
     * @return string
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * @param string $nomUser
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;
    }

    /**
     * @return string
     */
    public function getPrenomUser()
    {
        return $this->prenomUser;
    }

    /**
     * @param string $prenomUser
     */
    public function setPrenomUser($prenomUser)
    {
        $this->prenomUser = $prenomUser;
    }

    /**
     * @return string
     */
    public function getMedicaments()
    {
        return $this->medicaments;
    }

    /**
     * @param string $medicaments
     */
    public function setMedicaments($medicaments)
    {
        $this->medicaments = $medicaments;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \FicheMedicale
     */
    public function getIdFiche()
    {
        return $this->idFiche;
    }

    /**
     * @param \FicheMedicale $idFiche
     */
    public function setIdFiche($idFiche)
    {
        $this->idFiche = $idFiche;
    }

    /**
     * @return \Resident
     */
    public function getIdResident()
    {
        return $this->idResident;
    }

    /**
     * @param \Resident $idResident
     */
    public function setIdResident($idResident)
    {
        $this->idResident = $idResident;
    }

    /**
     * @return \User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \User $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


}

