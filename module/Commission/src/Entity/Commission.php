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
    private $id;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    private $artist;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    private $title;

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the $artist
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     *
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param string $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    /**
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
