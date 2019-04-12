<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrescriptionsMedicaments
 *
 * @ORM\Table(name="prescriptions_medicaments", indexes={@ORM\Index(name="id_dossier", columns={"id_dossier"})})
 * @ORM\Entity
 */
class PrescriptionsMedicaments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_prescriptions_medicaments", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPrescriptionsMedicaments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_traitement", type="date", nullable=false)
     */
    private $dateDebutTraitement;

    /**
     * @var \string
     *
     * @ORM\Column(name="description_medicament",type="string", length=20000, nullable=false)
     */
    private $descriptionMedicament;
    /**
     * @var \DossierMedicale
     *
     * @ORM\ManyToOne(targetEntity="DossierMedicale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dossier", referencedColumnName="id_dossier")
     * })
     */
    private $idDossier;

    /**
     * @return int
     */
    public function getIdPrescriptionsMedicaments()
    {
        return $this->idPrescriptionsMedicaments;
    }

    /**
     * @param int $idPrescriptionsMedicaments
     */
    public function setIdPrescriptionsMedicaments($idPrescriptionsMedicaments)
    {
        $this->idPrescriptionsMedicaments = $idPrescriptionsMedicaments;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebutTraitement()
    {
        return $this->dateDebutTraitement;
    }

    /**
     * @param \DateTime $dateDebutTraitement
     */
    public function setDateDebutTraitement($dateDebutTraitement)
    {
        $this->dateDebutTraitement = $dateDebutTraitement;
    }

    /**
     * @return \DossierMedicale
     */
    public function getIdDossier()
    {
        return $this->idDossier;
    }

    /**
     * @param \DossierMedicale $idDossier
     */
    public function setIdDossier($idDossier)
    {
        $this->idDossier = $idDossier;
    }

    /**
     * @return string
     */
    public function getDescriptionMedicament()
    {
        return $this->descriptionMedicament;
    }

    /**
     * @param string $descriptionMedicament
     */
    public function setDescriptionMedicament($descriptionMedicament)
    {
        $this->descriptionMedicament = $descriptionMedicament;
    }


}

