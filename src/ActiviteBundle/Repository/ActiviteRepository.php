<?php
/**
 * Created by PhpStorm.
 * User: poste
 * Date: 16/04/2019
 * Time: 16:54
 */

namespace ActiviteBundle\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * @ORM\Entity(repositoryClass="ActiviteBundle\Repository\ActiviteRepository")
 * @ORM\Table(name="activite")
 * @ORM\HasLifecycleCallbacks()
 */

class ActiviteRepository extends EntityRepository
{



    public function findOneByChercher($str){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p
                FROM ActiviteBundle:Activite p
                WHERE p.nom_activite LIKE :str'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }



}