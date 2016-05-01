<?php
namespace Commission\Entity;

/**
 * @Entity @Table(name="commission")
 */
class Commission
{

    /**
     * @Id @Column(type="integer") @GeneratedValue
     *
     * @var int
     */
    public $id;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    public $artist;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    public $title;
}
