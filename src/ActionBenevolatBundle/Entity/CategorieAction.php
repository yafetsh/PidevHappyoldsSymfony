<?php

namespace ActionBenevolatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieAction
 *
 * @ORM\Table(name="categorie_action")
 * @ORM\Entity
 */
class CategorieAction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;


}

