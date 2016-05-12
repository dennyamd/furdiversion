<?php
namespace Commission\Repository;

use Commission\Entity\Commission;
use Doctrine\ORM\EntityManager;

class CommissionRepository
{

    /**
     *
     * @var EntityManager
     */
    protected $em;

    function getRepository()
    {
        return $this->em;
    }

    function setRepository($em)
    {
        $this->em = $em;
    }

    function saveCommission(Commission $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
        return $entity->getId();
    }

}
