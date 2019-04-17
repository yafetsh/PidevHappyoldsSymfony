<?php
/**
 * Created by PhpStorm.
 * User: poste
 * Date: 16/04/2019
 * Time: 14:44
 */

namespace ActiviteBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Activite
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity
 */

class Rating
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var int
     *
     *  @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="idCli", referencedColumnName="id")
     */
    private $idCli;

    /**
     * @ORM\ManyToOne(targetEntity="Activite")
     * @ORM\JoinColumn(name="idHisto", referencedColumnName="id_activite")
     */
    private $idact;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param int $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return int
     */
    public function getIdCli()
    {
        return $this->idCli;
    }

    /**
     * @param int $idCli
     */
    public function setIdCli($idCli)
    {
        $this->idCli = $idCli;
    }

    /**
     * @return mixed
     */
    public function getIdact()
    {
        return $this->idact;
    }

    /**
     * @param mixed $idact
     */
    public function setIdact($idact)
    {
        $this->idact = $idact;
    }





}
