<?php

namespace MaisonretraiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\NotificationsBundle\Builder\NotificationBuilder;
use SBC\NotificationsBundle\Model\NotifiableInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Maison
 *
 * @ORM\Table(name="maison", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Maison implements NotifiableInterface
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
     * @ORM\Column(name="adresse_maison", type="string", length=20, nullable=false)
     * @Assert\NotBlank(message="Le nom est obligatoire")
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
     * @Assert\NotBlank()
     */
    private $mailMaison;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_personne", type="integer", nullable=false)
     * @Assert\NotBlank()
     */
    private $nbrPersonne;

    /**
     * @return int
     */
    public function getIdMaison()
    {
        return $this->idMaison;
    }

    /**
     * @param int $idMaison
     */
    public function setIdMaison($idMaison)
    {
        $this->idMaison = $idMaison;
    }

    /**
     * @return string
     */
    public function getNomMaison()
    {
        return $this->nomMaison;
    }

    /**
     * @param string $nomMaison
     */
    public function setNomMaison($nomMaison)
    {
        $this->nomMaison = $nomMaison;
    }

    /**
     * @return string
     */
    public function getAdresseMaison()
    {
        return $this->adresseMaison;
    }

    /**
     * @param string $adresseMaison
     */
    public function setAdresseMaison($adresseMaison)
    {
        $this->adresseMaison = $adresseMaison;
    }

    /**
     * @return string
     */
    public function getTelephoneMaison()
    {
        return $this->telephoneMaison;
    }

    /**
     * @param string $telephoneMaison
     */
    public function setTelephoneMaison($telephoneMaison)
    {
        $this->telephoneMaison = $telephoneMaison;
    }

    /**
     * @return string
     */
    public function getMailMaison()
    {
        return $this->mailMaison;
    }

    /**
     * @param string $mailMaison
     */
    public function setMailMaison($mailMaison)
    {
        $this->mailMaison = $mailMaison;
    }

    /**
     * @return int
     */
    public function getNbrPersonne()
    {
        return $this->nbrPersonne;
    }

    /**
     * @param int $nbrPersonne
     */
    public function setNbrPersonne($nbrPersonne)
    {
        $this->nbrPersonne = $nbrPersonne;
    }

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @return \User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \User $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function notificationsOnCreate(NotificationBuilder $builder)
    {
        $notification = new Notification();
        $notification
            ->setTitle('New Maison')
            ->setDescription($this->nomMaison)
            ->setRoute('affiche_ma')// I suppose you have a show route for your entity
            ->setParameters(array('id' => $this->idMaison))
        ;
        $builder->addNotification($notification);

        return $builder;    }

    public function notificationsOnUpdate(NotificationBuilder $builder)
    {
        $notification = new Notification();
        $notification
            ->setTitle('Maison updated')
            ->setDescription($this->nomMaison)
            ->setRoute('affiche_ma')
            ->setParameters(array('id' => $this->idMaison))
        ;
        $builder->addNotification($notification);

        return $builder;    }

    public function notificationsOnDelete(NotificationBuilder $builder)
    {
        // in case you don't want any notification for a special event
        // you can simply return an empty $builder
        return $builder;    }


}

