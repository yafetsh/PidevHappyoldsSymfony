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






class ActiviteRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Activite::class);
    }

    public function findPostByid($id)
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