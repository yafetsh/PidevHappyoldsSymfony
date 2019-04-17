<?php

namespace ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity
 */
class Activite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_activite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActivite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_activite", type="string", length=32, nullable=false)
     */
    private $nomActivite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_activite", type="date", nullable=false)
     */
    private $dateActivite;

    /**
     * @var string
     *
     * @ORM\Column(name="description_activite", type="string", length=255, nullable=false)
     */
    private $descriptionActivite;

    /**
     * @ORM\Column(name="photo", type="string", length=500)
     * @Assert\File(maxSize="500k", mimeTypes={"image/jpeg", "image/jpg", "image/png", "image/GIF"})
     */

    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity="Animateur")
     * @ORM\JoinColumn(name="id_animateur",referencedColumnName="id_animateur")
     */

    private $animateur;

    /**
     * @ORM\ManyToOne(targetEntity="CategorieActivite")
     * @ORM\JoinColumn(name="id_categorie",referencedColumnName="id_categoriea")
     */
    private $categorieActivite;

    /**
     * @return int
     */
    public function getIdActivite()
    {
        return $this->idActivite;
    }

    /**
     * @param int $idActivite
     */
    public function setIdActivite($idActivite)
    {
        $this->idActivite = $idActivite;
    }

    /**
     * @return string
     */
    public function getNomActivite()
    {
        return $this->nomActivite;
    }

    /**
     * @param string $nomActivite
     */
    public function setNomActivite($nomActivite)
    {
        $this->nomActivite = $nomActivite;
    }

    /**
     * @return \DateTime
     */
    public function getDateActivite()
    {
        return $this->dateActivite;
    }

    /**
     * @param \DateTime $dateActivite
     */
    public function setDateActivite($dateActivite)
    {
        $this->dateActivite = $dateActivite;
    }

    /**
     * @return string
     */
    public function getDescriptionActivite()
    {
        return $this->descriptionActivite;
    }

    /**
     * @param string $descriptionActivite
     */
    public function setDescriptionActivite($descriptionActivite)
    {
        $this->descriptionActivite = $descriptionActivite;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getAnimateur()
    {
        return $this->animateur;
    }

    /**
     * @param mixed $animateur
     */
    public function setAnimateur($animateur)
    {
        $this->animateur = $animateur;
    }

    /**
     * @return mixed
     */
    public function getCategorieActivite()
    {
        return $this->categorieActivite;
    }

    /**
     * @param mixed $categorieActivite
     */
    public function setCategorieActivite($categorieActivite)
    {
        $this->categorieActivite = $categorieActivite;
    }




}
