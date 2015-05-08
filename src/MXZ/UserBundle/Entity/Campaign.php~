<?php

namespace MXZ\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Campaign
 */
class Campaign
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $players;

    /**
     * @var integer
     */
    private $gmid;

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set playersId
     *
     * @param integer $playersId
     * @return Campaign
     */
    public function setPlayers($playersId)
    {
        $this->players = $playersId;

        return $this;
    }

    /**
     * Get playersId
     *
     * @return integer 
     */
    public function getPlayers()
    {
        return $this->players;
    }


    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

    /**
     * Set gmid
     *
     * @param \MXZ\UserBundle\Entity\User $gmid
     * @return Campaign
     */
    public function setGmid(\MXZ\UserBundle\Entity\User $gmid = null)
    {
        $this->gmid = $gmid;

        return $this;
    }

    /**
     * Get gmid
     *
     * @return \MXZ\UserBundle\Entity\User 
     */
    public function getGmid()
    {
        return $this->gmid;
    }

    /**
     * Add players
     *
     * @param \MXZ\UserBundle\Entity\User $players
     * @return Campaign
     */
    public function addPlayer(\MXZ\UserBundle\Entity\User $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \MXZ\UserBundle\Entity\User $players
     */
    public function removePlayer(\MXZ\UserBundle\Entity\User $players)
    {
        $this->players->removeElement($players);
    }
}
