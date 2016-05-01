<?php
namespace Commission\Repository;

class CommissionRepository
{

    protected $em;

    function getRepository()
    {
        if (! $this->em)
            $this->em = $this->serviceLocator->get('doctrine');
        return $this->em;
    }
}
