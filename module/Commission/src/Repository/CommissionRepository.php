<?php
namespace Commission\Repository;

class CommissionRepository
{

    protected $em;

    function getRepository()
    {
        return $this->em;
    }

    function setRepository($em)
    {
        $this->em = $em;
    }

    function saveCommission()
    {
        print 'FUCK YOU';
        exit();
    }
}
