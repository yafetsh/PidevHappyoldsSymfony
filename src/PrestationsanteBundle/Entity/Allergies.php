<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Allergies
 *
 * @ORM\Table(name="allergies", indexes={@ORM\Index(name="id_dossier", columns={"id_dossier"})})
 * @ORM\Entity
 */
class Allergies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_allergie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAllergie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_allergies", type="date", nullable=false)
     */
    private $dateAllergies;

    /**
     * @var string
     *
     * @ORM\Column(name="antecedants", type="string", length=2000, nullable=false)
     */
    private $antecedants;

    /**
     * @var \string
     *
     * @ORM\Column(name="description_allergie",type="string", length=20000, nullable=false)
     */
    private $descriptionAllergie;

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
    public function getIdAllergie()
    {
        return $this->idAllergie;
    }

    /**
     * @param int $idAllergie
     */
    public function setIdAllergie($idAllergie)
    {
        $this->idAllergie = $idAllergie;
    }

    /**
     * @return \DateTime
     */
    public function getDateAllergies()
    {
        return $this->dateAllergies;
    }

    /**
     * @param \DateTime $dateAllergies
     */
    public function setDateAllergies($dateAllergies)
    {
        $this->dateAllergies = $dateAllergies;
    }

    /**
     * @return string
     */
    public function getAntecedants()
    {
        return $this->antecedants;
    }

    /**
     * @param string $antecedants
     */
    public function setAntecedants($antecedants)
    {
        $this->antecedants = $antecedants;
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
    public function getDescriptionAllergie()
    {
        return $this->descriptionAllergie;
    }

    /**
     * @param string $descriptionAllergie
     */
    public function setDescriptionAllergie($descriptionAllergie)
    {
        $this->descriptionAllergie = $descriptionAllergie;
    }


}

