<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DossierMedicale
 *
 * @ORM\Table(name="dossier_medicale", indexes={@ORM\Index(name="id_resident", columns={"id_resident"})})
 * @ORM\Entity(repositoryClass="PrestationsanteBundle\Repository\DossierRepository")
 */
class DossierMedicale
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dossier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDossier;

    /**
     * @var string
     *
     * @ORM\Column(name="problemes_sante", type="string", length=2000, nullable=false)
     */
    private $problemesSante;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_visite", type="integer", nullable=false)
     */
    private $nbVisite;

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
     * @return int
     */
    public function getIdDossier()
    {
        return $this->idDossier;
    }

    /**
     * @param int $idDossier
     */
    public function setIdDossier($idDossier)
    {
        $this->idDossier = $idDossier;
    }

    /**
     * @return string
     */
    public function getProblemesSante()
    {
        return $this->problemesSante;
    }

    /**
     * @param string $problemesSante
     */
    public function setProblemesSante($problemesSante)
    {
        $this->problemesSante = $problemesSante;
    }

    /**
     * @return int
     */
    public function getNbVisite()
    {
        return $this->nbVisite;
    }

    /**
     * @param int $nbVisite
     */
    public function setNbVisite($nbVisite)
    {
        $this->nbVisite = $nbVisite;
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


}

