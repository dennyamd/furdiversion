<?php
namespace Commission\Repository;

use Commission\Entity\Commission;
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

    function saveCommission(Commission $x)
    {die ("HI");
        exit();
    }
}
