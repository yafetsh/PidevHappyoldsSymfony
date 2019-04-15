<?php

namespace DonsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="id_maison", columns={"id_maison"}), @ORM\Index(name="id_demande", columns={"id_demande"}), @ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_demande_categorie", columns={"id_demande_categorie"}), @ORM\Index(name="id_demande_2", columns={"id_demande"}), @ORM\Index(name="id_demande_categorie_2", columns={"id_demande_categorie"}), @ORM\Index(name="id_demande_categorie_3", columns={"id_demande_categorie"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_demande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite_demande", type="integer", nullable=false)
     */
    private $quantiteDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="description_demande", type="string", length=255, nullable=false)
     */
    private $descriptionDemande;

    /**
     * @var \Maison
     *
     * @ORM\ManyToOne(targetEntity="MaisonretraiteBundle\Entity\Maison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_maison", referencedColumnName="id_maison")
     * })
     */
    private $idMaison;

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
     * @var \CategorieDemande
     *
     * @ORM\ManyToOne(targetEntity="CategorieDemande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_demande_categorie", referencedColumnName="id_categorie")
     * })
     */
    private $idDemandeCategorie;

    /**
     * @return int
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param int $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    /**
     * @return int
     */
    public function getQuantiteDemande()
    {
        return $this->quantiteDemande;
    }

    /**
     * @param int $quantiteDemande
     */
    public function setQuantiteDemande($quantiteDemande)
    {
        $this->quantiteDemande = $quantiteDemande;
    }

    /**
     * @return string
     */
    public function getDescriptionDemande()
    {
        return $this->descriptionDemande;
    }

    /**
     * @param string $descriptionDemande
     */
    public function setDescriptionDemande($descriptionDemande)
    {
        $this->descriptionDemande = $descriptionDemande;
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

    /**
     * @return \CategorieDemande
     */
    public function getIdDemandeCategorie()
    {
        return $this->idDemandeCategorie;
    }

    /**
     * @param \CategorieDemande $idDemandeCategorie
     */
    public function setIdDemandeCategorie($idDemandeCategorie)
    {
        $this->idDemandeCategorie = $idDemandeCategorie;
    }


}

