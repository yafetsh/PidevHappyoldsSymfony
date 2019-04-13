<?php
/**
 * Created by PhpStorm.
 * User: poste
 * Date: 25/02/2019
 * Time: 14:34
 */

namespace ActiviteBundle\Repository;

use ActiviteBundle\Entity\Activite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;



use Doctrine\ORM\NonUniqueResultException;



/**
 * Class ActiviteRepository
 * @package Esprit\ParcBundle\Entity
 */

/**
 * @ORM\Entity(repositoryClass="Esprit\ParcBundle\Repository\ActiviteRepository")
 */




class ActiviteRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Activite::class);
    }

    /**
     * get one by id
     *
     * @param integer $id
     *
     * @return object or null
     */
    public function findActiviteByid($id)
    {
        try {
            return $this->getEntityManager()
                ->createQuery(
                    "SELECT p
                FROM ActiviteBundle:Activite
                p WHERE p.idActivite =:idActivite"
                )
                ->setParameter('id', $id)
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
        }


    }
}