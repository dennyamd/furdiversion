<?php
namespace Commission\Output;

use Commission\Entity\Commission;

/**
 * Translates form input to Object
 */
class CommissionOutput
{

    function getCommission(array $data)
    {
        $commission = new Commission();
        $commission->setName($data['name']);
        $commission->setEmail($data['email']);
        $commission->setSpecies($data['species']);
        $commission->setSuitType($data['suit-type']);
        $commission->setRequest($data['request']);


        return $commission;
    }
}

