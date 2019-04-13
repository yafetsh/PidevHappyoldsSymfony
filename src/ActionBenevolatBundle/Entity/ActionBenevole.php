<?php

namespace ActionBenevolatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionBenevole
 *
 * @ORM\Table(name="action_benevole")
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
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=32, nullable=false, options={"default":"invalide"})
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type_id",referencedColumnName="id_type")
     */
    private $type;

    /**
     * @return int
     */
    public function getIdAction()
    {
        return $this->idAction;
    }

    /**
     * @param int $idAction
     */
    public function setIdAction($idAction)
    {
        $this->idAction = $idAction;
    }

    /**
     * @return \DateTime
     */
    public function getDateDAction()
    {
        return $this->dateDAction;
    }

    /**
     * @param \DateTime $dateDAction
     */
    public function setDateDAction($dateDAction)
    {
        $this->dateDAction = $dateDAction;
    }

    /**
     * @return \DateTime
     */
    public function getDateFAction()
    {
        return $this->dateFAction;
    }

    /**
     * @param \DateTime $dateFAction
     */
    public function setDateFAction($dateFAction)
    {
        $this->dateFAction = $dateFAction;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}

