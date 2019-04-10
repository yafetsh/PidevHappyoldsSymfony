<?php

namespace ActionBenevolatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionBenevole
 *
 * @ORM\Table(name="action_benevole", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class ActionBenevole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_action", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAction;

    /**
     * @var string
     *
     * @ORM\Column(name="type_action", type="string", length=255, nullable=false)
     */
    private $typeAction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_d_action", type="date", nullable=false)
     */
    private $dateDAction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_f_action", type="date", nullable=false)
     */
    private $dateFAction;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=32, nullable=false)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="categorieAction")
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id")
     */
    private $CategorieAction;


}

