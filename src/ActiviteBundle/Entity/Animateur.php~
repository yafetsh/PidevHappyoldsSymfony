<?php

namespace ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * animateur
 *
 * @ORM\Table(name="animateur")
 * @ORM\Entity
 */
class Animateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_animateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_animateur", type="string", length=32, nullable=false)
     */
    private $nomAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_animateur", type="string", length=32, nullable=false)
     */
    private $prenomAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_animateur", type="string", length=32, nullable=false)
     */
    private $mailAnimateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel_animateur", type="integer", nullable=false)
     */
    private $telAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_animateur", type="string", length=255, nullable=false)
     */
    private $adresseAnimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="dispo", type="string", length=255, nullable=false)
     */

    private $dispo;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getIdAnimateur()
    {
        return $this->idAnimateur;
    }

    /**
     * @param int $idAnimateur
     */
    public function setIdAnimateur($idAnimateur)
    {
        $this->idAnimateur = $idAnimateur;
    }

    /**
     * @return string
     */
    public function getNomAnimateur()
    {
        return $this->nomAnimateur;
    }

    /**
     * @param string $nomAnimateur
     */
    public function setNomAnimateur($nomAnimateur)
    {
        $this->nomAnimateur = $nomAnimateur;
    }

    /**
     * @return string
     */
    public function getPrenomAnimateur()
    {
        return $this->prenomAnimateur;
    }

    /**
     * @param string $prenomAnimateur
     */
    public function setPrenomAnimateur($prenomAnimateur)
    {
        $this->prenomAnimateur = $prenomAnimateur;
    }

    /**
     * @return string
     */
    public function getMailAnimateur()
    {
        return $this->mailAnimateur;
    }

    /**
     * @param string $mailAnimateur
     */
    public function setMailAnimateur($mailAnimateur)
    {
        $this->mailAnimateur = $mailAnimateur;
    }

    /**
     * @return int
     */
    public function getTelAnimateur()
    {
        return $this->telAnimateur;
    }

    /**
     * @param int $telAnimateur
     */
    public function setTelAnimateur($telAnimateur)
    {
        $this->telAnimateur = $telAnimateur;
    }

    /**
     * @return string
     */
    public function getAdresseAnimateur()
    {
        return $this->adresseAnimateur;
    }

    /**
     * @param string $adresseAnimateur
     */
    public function setAdresseAnimateur($adresseAnimateur)
    {
        $this->adresseAnimateur = $adresseAnimateur;
    }

    /**
     * @return string
     */
    public function getDispo()
    {
        return $this->dispo;
    }

    /**
     * @param string $dispo
     */
    public function setDispo($dispo)
    {
        $this->dispo = $dispo;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }




}
