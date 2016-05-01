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
        $commission->setArtist($data['artist']);
        $commission->setTitle($data['title']);

        return $commission;
    }
}

