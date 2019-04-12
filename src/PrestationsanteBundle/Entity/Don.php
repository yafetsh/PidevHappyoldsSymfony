<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don", indexes={@ORM\Index(name="id_demande", columns={"id_demande"}), @ORM\Index(name="id_user", columns={"id_user"})})
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
     * @var string
     *
     * @ORM\Column(name="categorie_don", type="string", length=255, nullable=false)
     */
    private $categorieDon;

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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;


}

