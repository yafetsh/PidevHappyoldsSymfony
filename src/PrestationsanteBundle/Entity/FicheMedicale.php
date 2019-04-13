<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheMedicale
 *
 * @ORM\Table(name="fiche_medicale")
 * @ORM\Entity
 */
class FicheMedicale
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fiche", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFiche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_fiche", type="date", nullable=true)
     */
    private $dateCreationFiche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_dermodif_fiche", type="date", nullable=true)
     */
    private $dateDermodifFiche;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques_fiche", type="string", length=20000, nullable=false)
     */
    private $remarquesFiche;

    /**
     * @var float
     *
     * @ORM\Column(name="niveau_temp", type="float", precision=10, scale=0, nullable=false)
     */
    private $niveauTemp;

    /**
     * @var float
     *
     * @ORM\Column(name="niveau_sec", type="float", precision=10, scale=0, nullable=false)
     */
    private $niveauSec;

    /**
     * @var float
     *
     * @ORM\Column(name="niveau_tension", type="float", precision=10, scale=0, nullable=false)
     */
    private $niveauTension;

    /**
     * @var string
     *
     * @ORM\Column(name="groupe_sanguin", type="string", length=2, nullable=false)
     */
    private $groupeSanguin;

    /**
     * @var string
     *
     * @ORM\Column(name="medicaments", type="string", length=20000, nullable=false)
     */
    private $medicaments;

    /**
     * @var float
     *
     * @ORM\Column(name="taille_resident", type="float", precision=10, scale=0, nullable=false)
     */
    private $tailleResident;

    /**
     * @var float
     *
     * @ORM\Column(name="poids_resident", type="float", precision=10, scale=0, nullable=false)
     */
    private $poidsResident;

    /**
     * @return int
     */
    public function getIdFiche()
    {
        return $this->idFiche;
    }

    /**
     * @param int $idFiche
     */
    public function setIdFiche($idFiche)
    {
        $this->idFiche = $idFiche;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreationFiche()
    {
        return $this->dateCreationFiche;
    }

    /**
     * @param \DateTime $dateCreationFiche
     */
    public function setDateCreationFiche($dateCreationFiche)
    {
        $this->dateCreationFiche = $dateCreationFiche;
    }

    /**
     * @return \DateTime
     */
    public function getDateDermodifFiche()
    {
        return $this->dateDermodifFiche;
    }

    /**
     * @param \DateTime $dateDermodifFiche
     */
    public function setDateDermodifFiche($dateDermodifFiche)
    {
        $this->dateDermodifFiche = $dateDermodifFiche;
    }

    /**
     * @return string
     */
    public function getRemarquesFiche()
    {
        return $this->remarquesFiche;
    }

    /**
     * @param string $remarquesFiche
     */
    public function setRemarquesFiche($remarquesFiche)
    {
        $this->remarquesFiche = $remarquesFiche;
    }

    /**
     * @return float
     */
    public function getNiveauTemp()
    {
        return $this->niveauTemp;
    }

    /**
     * @param float $niveauTemp
     */
    public function setNiveauTemp($niveauTemp)
    {
        $this->niveauTemp = $niveauTemp;
    }

    /**
     * @return float
     */
    public function getNiveauSec()
    {
        return $this->niveauSec;
    }

    /**
     * @param float $niveauSec
     */
    public function setNiveauSec($niveauSec)
    {
        $this->niveauSec = $niveauSec;
    }

    /**
     * @return float
     */
    public function getNiveauTension()
    {
        return $this->niveauTension;
    }

    /**
     * @param float $niveauTension
     */
    public function setNiveauTension($niveauTension)
    {
        $this->niveauTension = $niveauTension;
    }

    /**
     * @return string
     */
    public function getGroupeSanguin()
    {
        return $this->groupeSanguin;
    }

    /**
     * @param string $groupeSanguin
     */
    public function setGroupeSanguin($groupeSanguin)
    {
        $this->groupeSanguin = $groupeSanguin;
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
     * @return float
     */
    public function getTailleResident()
    {
        return $this->tailleResident;
    }

    /**
     * @param float $tailleResident
     */
    public function setTailleResident($tailleResident)
    {
        $this->tailleResident = $tailleResident;
    }

    /**
     * @return float
     */
    public function getPoidsResident()
    {
        return $this->poidsResident;
    }

    /**
     * @param float $poidsResident
     */
    public function setPoidsResident($poidsResident)
    {
        $this->poidsResident = $poidsResident;
    }


}

