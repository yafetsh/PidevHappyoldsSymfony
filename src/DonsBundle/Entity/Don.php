<?php

namespace DonsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_demande", columns={"id_demande"}), @ORM\Index(name="id_user_2", columns={"id_user"}), @ORM\Index(name="id_demande_2", columns={"id_demande"}), @ORM\Index(name="id_don_categorie", columns={"id_don_categorie"})})
 * @ORM\Entity
 */
class Don
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_don", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDon;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite_don", type="integer", nullable=false)
     */
    private $quantiteDon;

    /**
     * @var string
     *
     * @ORM\Column(name="description_don", type="string", length=255, nullable=false)
     */
    private $descriptionDon;

    /**
     * @var \Demande
     *
     * @ORM\ManyToOne(targetEntity="Demande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_demande", referencedColumnName="id_demande")
     * })
     */
    private $idDemande;

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
     *   @ORM\JoinColumn(name="id_don_categorie", referencedColumnName="id_categorie")
     * })
     */
    private $idDonCategorie;

    /**
     * @return int
     */
    public function getIdDon()
    {
        return $this->idDon;
    }

    /**
     * @param int $idDon
     */
    public function setIdDon($idDon)
    {
        $this->idDon = $idDon;
    }

    /**
     * @return int
     */
    public function getQuantiteDon()
    {
        return $this->quantiteDon;
    }

    /**
     * @param int $quantiteDon
     */
    public function setQuantiteDon($quantiteDon)
    {
        $this->quantiteDon = $quantiteDon;
    }

    /**
     * @return string
     */
    public function getDescriptionDon()
    {
        return $this->descriptionDon;
    }

    /**
     * @param string $descriptionDon
     */
    public function setDescriptionDon($descriptionDon)
    {
        $this->descriptionDon = $descriptionDon;
    }

    /**
     * @return \Demande
     */
    public function getIdDemande()
    {
        return $this->idDemande;
    }

    /**
     * @param \Demande $idDemande
     */
    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
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
    public function getIdDonCategorie()
    {
        return $this->idDonCategorie;
    }

    /**
     * @param \CategorieDemande $idDonCategorie
     */
    public function setIdDonCategorie($idDonCategorie)
    {
        $this->idDonCategorie = $idDonCategorie;
    }


}

