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
        // save form data
        $commission = new Commission();
        $commission->setName($data['name']);
        $commission->setEmail($data['email']);
        $commission->setSpecies($data['species']);
        $commission->setSuitType($data['suit-type']);
        $commission->setCharacterRef($data['character-ref']['name']);
        $commission->setRequest($data['request']);

        return $commission;
    }
}

