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
    private $name;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    private $email;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    private $species;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    private $suitType;

    /**
     * @Column(type="string")
     *
     * @var string
     */
    private $request;

    /**
     *
     * @return the $suitType
     */
    public function getSuitType()
    {
        return $this->suitType;
    }

    /**
     *
     * @param string $suitType
     */
    public function setSuitType($suitType)
    {
        $this->suitType = $suitType;
    }

    /**
     *
     * @return the $species
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     *
     * @return the $request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     *
     * @param string $species
     */
    public function setSpecies($species)
    {
        $this->species = $species;
    }

    /**
     *
     * @param string $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

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
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
