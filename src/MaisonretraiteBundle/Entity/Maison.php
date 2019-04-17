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
class Maison {
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
     * @Assert\NotBlank(message="Entrez le nom de votre maison")
     */
    private $nomMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_maison", type="string", length=20, nullable=false)
     * @Assert\NotBlank(message="Entrez l'adresse de votre maison")
     */
    private $adresseMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_maison", type="string", length=8, nullable=false)
     * @Assert\NotBlank(message="Entrez le numero de votre maison")
     * @Assert\Type(
     *     type="integer",
     *     message="{{ value }} Ne s'agit pas d'un numéro téléphone, c'est un {{ type }}."
     * )
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
     *      minMessage = "Entrez un nombre de téléphone valide (8 chiffres)",
     *      maxMessage = "Entrez un nombre de téléphone valide (8 chiffres)"
     * )

     */
    private $telephoneMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_maison", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="Entrez l'adresse mail de votre maison")
     * @Assert\Email(
     *     message = "Entrez une adresse mail valide",
     *     checkMX = true
     * )
     */
    private $mailMaison;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_personne", type="integer", nullable=false)
     * @Assert\NotBlank(message="Entrez le nombre des places")
     * * @Assert\Type(
     *     type="integer",
     *     message="{{ value }} N'est pas un nombre {{ type }}.")
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



}

