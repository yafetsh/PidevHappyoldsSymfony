<?php

namespace PrestationsanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_maison", columns={"id_maison"}), @ORM\Index(name="description_evenement", columns={"description_evenement"}), @ORM\Index(name="heure_evenement", columns={"heure_evenement"}), @ORM\Index(name="heure_evenement_2", columns={"heure_evenement"}), @ORM\Index(name="heure_evenement_3", columns={"heure_evenement"}), @ORM\Index(name="heure_evenement_4", columns={"heure_evenement"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_evenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_d_evenement", type="date", nullable=false)
     */
    private $dateDEvenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_f_evenement", type="date", nullable=false)
     */
    private $dateFEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_evenement", type="string", length=255, nullable=false)
     */
    private $heureEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_evenement", type="string", length=255, nullable=false)
     */
    private $nomEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_evenement", type="string", length=255, nullable=false)
     */
    private $adresseEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="description_evenement", type="string", length=255, nullable=true)
     */
    private $descriptionEvenement;

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

