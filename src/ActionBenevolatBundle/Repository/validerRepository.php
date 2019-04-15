<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 14/04/2019
 * Time: 12:25
 */

namespace ActionBenevolatBundle\Repository;
use Doctrine\ORM\EntityRepository;

class validerRepository extends EntityRepository
{
    public function validerDQL(){
        $query=$this->getEntityManager()
            ->createQuery("
                                select a from ActionBenevolatBundle:Action a where a.etat='invalide'");
        return $query->getResult();

    }
    
}