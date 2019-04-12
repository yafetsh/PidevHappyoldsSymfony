<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maison
 *
 * @ORM\Table(name="maison", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Maison
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_maison", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_maison", type="string", length=20, nullable=false)
     */
    private $nomMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_maison", type="string", length=255, nullable=false)
     */
    private $adresseMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_maison", type="string", length=8, nullable=false)
     */
    private $telephoneMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_maison", type="string", length=30, nullable=false)
     */
    private $mailMaison;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_personne", type="integer", nullable=false)
     */
    private $nbrPersonne = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_homme", type="integer", nullable=false)
     */
    private $nbrHomme = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_femme", type="integer", nullable=false)
     */
    private $nbrFemme = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_alzheimer", type="integer", nullable=false)
     */
    private $nbrAlzheimer = '0';

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

