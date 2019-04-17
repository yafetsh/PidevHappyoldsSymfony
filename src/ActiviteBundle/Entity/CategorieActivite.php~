<?php

namespace ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieActivite
 *
 * @ORM\Table(name="categorie_activite")
 * @ORM\Entity
 */
class CategorieActivite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_categoriea", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategoriea;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;

    /**
     * @return int
     */
    public function getIdCategoriea()
    {
        return $this->idCategoriea;
    }

    /**
     * @param int $idCategoriea
     */
    public function setIdCategoriea($idCategoriea)
    {
        $this->idCategoriea = $idCategoriea;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}
