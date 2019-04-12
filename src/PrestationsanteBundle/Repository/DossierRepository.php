<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 10/04/2019
 * Time: 22:47
 */

namespace PrestationsanteBundle\Repository;
use Doctrine\ORM\EntityRepository;


class DossierRepository extends EntityRepository
{
        public function WithResidentId($id){
        $query=$this->createQueryBuilder('d');
        $query->where("d.idResident=:idResident")->setParameter('idResident',$id);
        return $query->getQuery()->getResult();
    }

    public function WithResidentIdDQL($id)
    {
        $query=$this->getEntityManager()
            ->createQuery("select d from PrestationsanteBundle:DossierMedicale d where d.idResident =:idResident")
            ->setParameter('idResident',$id);
        return $query->getResult();
    }
}