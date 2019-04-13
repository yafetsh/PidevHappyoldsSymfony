<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="id_demande", columns={"id_demande"}), @ORM\Index(name="demande_ibfk_1", columns={"id_maison"}), @ORM\Index(name="id_user", columns={"id_user"})})
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
     * @var string
     *
     * @ORM\Column(name="categorie_demande", type="string", length=255, nullable=false)
     */
    private $categorieDemande;

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
     * @ORM\ManyToOne(targetEntity="Maison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_maison", referencedColumnName="id_maison")
     * })
     */
    private $idMaison;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;


}

