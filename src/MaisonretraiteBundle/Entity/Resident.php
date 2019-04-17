<?php

namespace MaisonretraiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\NotificationsBundle\Builder\NotificationBuilder;
use SBC\NotificationsBundle\Model\NotifiableInterface;

/**
 * Resident
 *
 * @ORM\Table(name="resident", indexes={@ORM\Index(name="id_maison", columns={"id_maison"})})
 * @ORM\Entity
 *
 */
class Resident implements NotifiableInterface , \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_resident", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResident;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_resident", type="string", length=20, nullable=false)
     */
    private $nomResident;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_resident", type="string", length=20, nullable=false)
     */
    private $prenomResident;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_resident", type="integer", nullable=false)
     */
    private $ageResident;


    /**
     * @var string
     *
     * @ORM\Column(name="sexe_resident", type="string", length=255, nullable=false)
     */
    private $sexeResident;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_resident", type="date", nullable=false)
     */
    private $dateResident;

//    /**
//     * @var integer
//     *
//     * @ORM\Column(name="alzheimer_resident", type="integer", nullable=false)
//     */
//    private $alzheimerResident;
    /**
     * @var string
     *
     * @ORM\Column(name="alzheimer_resident", type="string", length=10, nullable=false)
     */
    private $alzheimerResident;

    /**
     * @var string
     *
     * @ORM\Column(name="maladie_resident", type="string", length=255, nullable=false)
     */
    private $maladieResident;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=255, nullable=false)
     */
    private $responsable;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone_responsable", type="integer", nullable=false)
     */
    private $telephoneResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=32, nullable=false, options={"default":"invalide"})
     */
    private $etat;

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

//    /**
//     * @var \Maison
//     *
//     * @ORM\ManyToOne(targetEntity="Maison")
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="id_maison", referencedColumnName="id_maison")
//     * })
//     */
//    private $idMaison;

    /**
     * @ORM\ManyToOne(targetEntity="Maison")
     * @ORM\JoinColumn(name="id_maison",referencedColumnName="id_maison")
     */
    private $Maison;

    /**
     * @return int
     */
    public function getIdResident()
    {
        return $this->idResident;
    }

    /**
     * @param int $idResident
     */
    public function setIdResident($idResident)
    {
        $this->idResident = $idResident;
    }

    /**
     * @return string
     */
    public function getNomResident()
    {
        return $this->nomResident;
    }

    /**
     * @param string $nomResident
     */
    public function setNomResident($nomResident)
    {
        $this->nomResident = $nomResident;
    }

    /**
     * @return string
     */
    public function getPrenomResident()
    {
        return $this->prenomResident;
    }

    /**
     * @param string $prenomResident
     */
    public function setPrenomResident($prenomResident)
    {
        $this->prenomResident = $prenomResident;
    }

    /**
     * @return int
     */
    public function getAgeResident()
    {
        return $this->ageResident;
    }

    /**
     * @param int $ageResident
     */
    public function setAgeResident($ageResident)
    {
        $this->ageResident = $ageResident;
    }


    /**
     * @return string
     */
    public function getMaladieResident()
    {
        return $this->maladieResident;
    }

    /**
     * @param string $maladieResident
     */
    public function setMaladieResident($maladieResident)
    {
        $this->maladieResident = $maladieResident;
    }

    /**
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param string $responsable
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    /**
     * @return int
     */
    public function getTelephoneResponsable()
    {
        return $this->telephoneResponsable;
    }

    /**
     * @param int $telephoneResponsable
     */
    public function setTelephoneResponsable($telephoneResponsable)
    {
        $this->telephoneResponsable = $telephoneResponsable;
    }

    /**
     * @return \Maison
     */
    public function getIdMaison()
    {
        return $this->idMaison;
    }

    /**
     * @param \Maison $idMaison
     */
    public function setIdMaison($idMaison)
    {
        $this->idMaison = $idMaison;
    }

    /**
     * @return mixed
     */
    public function getMaison()
    {
        return $this->Maison;
    }

    /**
     * @param mixed $Maison
     */
    public function setMaison($Maison)
    {
        $this->Maison = $Maison;
    }

    /**
     * @return string
     */
    public function getSexeResident()
    {
        return $this->sexeResident;
    }

    /**
     * @param string $sexeResident
     */
    public function setSexeResident($sexeResident)
    {
        $this->sexeResident = $sexeResident;
    }

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getDateResident()
    {
//        return new \DateTime('now', (new \DateTimeZone('Africa/Tunis'));
        return $this->dateResident = new \DateTime();

//        return $this->dateResident;
    }

    /**
     * @param \DateTime $dateResident
     */
    public function setDateResident($dateResident)
    {
        $this->dateResident = $dateResident;
    }

    /**
     * @return string
     */
    public function getAlzheimerResident()
    {
        return $this->alzheimerResident;
    }

    /**
     * @param string $alzheimerResident
     */
    public function setAlzheimerResident($alzheimerResident)
    {
        $this->alzheimerResident = $alzheimerResident;
    }

    public function notificationsOnCreate(NotificationBuilder $builder)
    {
        $notification = new Notification();
        $notification
            ->setTitle('Un nouveau résident est inscrit')
            ->setDescription($this->prenomResident)
            ->setRoute('affiche_reA')// I suppose you have a show route for your entity
            ->setParameters(array('id' => $this->idResident))
        ;
        $builder->addNotification($notification);

        return $builder;    }

    public function notificationsOnUpdate(NotificationBuilder $builder)
    {
        $notification = new Notification();
        $notification
            ->setTitle('Un résident a modifié ces données')
            ->setDescription($this->prenomResident)
            ->setRoute('affiche_reA')
            ->setParameters(array('id' => $this->idResident))
        ;
        $builder->addNotification($notification);

        return $builder;    }

    public function notificationsOnDelete(NotificationBuilder $builder)
    {
        // in case you don't want any notification for a special event
        // you can simply return an empty $builder
        $this->etat='valide';

        return $builder;    }



    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

