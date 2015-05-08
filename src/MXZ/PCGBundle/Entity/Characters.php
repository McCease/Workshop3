<?php

namespace MXZ\PCGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Characters
 */
class Characters
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $alignment;

    /**
     * @var integer
     */
    private $race;

    /**
     * @var string
     */
    private $size;

    /**
     * @var integer
     */
    private $hP;

    /**
     * @var string
     */
    private $dR;

    /**
     * @var integer
     */
    private $initiative;

    /**
     * @var string
     */
    private $specialAbilities;

    /**
     * @var string
     */
    private $languages;

    /**
     * @var integer
     */
    private $xP;


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
     * Set name
     *
     * @param string $name
     * @return Characters
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set alignment
     *
     * @param string $alignment
     * @return Characters
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * Get alignment
     *
     * @return string
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * Set race
     *
     * @param integer $race
     * @return Characters
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return integer
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Characters
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set hP
     *
     * @param integer $hP
     * @return Characters
     */
    public function setHP($hP)
    {
        $this->hP = $hP;

        return $this;
    }

    /**
     * Get hP
     *
     * @return integer
     */
    public function getHP()
    {
        return $this->hP;
    }

    /**
     * Set dR
     *
     * @param string $dR
     * @return Characters
     */
    public function setDR($dR)
    {
        $this->dR = $dR;

        return $this;
    }

    /**
     * Get dR
     *
     * @return string
     */
    public function getDR()
    {
        return $this->dR;
    }

    /**
     * Set initiative
     *
     * @param integer $initiative
     * @return Characters
     */
    public function setInitiative($initiative)
    {
        $this->initiative = $initiative;

        return $this;
    }

    /**
     * Get initiative
     *
     * @return integer
     */
    public function getInitiative()
    {
        return $this->initiative;
    }

    /**
     * Set specialAbilities
     *
     * @param string $specialAbilities
     * @return Characters
     */
    public function setSpecialAbilities($specialAbilities)
    {
        $this->specialAbilities = $specialAbilities;

        return $this;
    }

    /**
     * Get specialAbilities
     *
     * @return string
     */
    public function getSpecialAbilities()
    {
        return $this->specialAbilities;
    }

    /**
     * Set languages
     *
     * @param string $languages
     * @return Characters
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages
     *
     * @return string
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set xP
     *
     * @param integer $xP
     * @return Characters
     */
    public function setXP($xP)
    {
        $this->xP = $xP;

        return $this;
    }

    /**
     * Get xP
     *
     * @return integer
     */
    public function getXP()
    {
        return $this->xP;
    }

    public function __construct($level = array(), $str = null, $dex = null, $con = null, $inte = null, $wis = null, $cha = null, $size = 'medium', $hP = 0, $dR = 0, $initiative = 0, $skills = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0), $feats = array(), $special_abilities = '', $languages = '', $XP = 0, $unspent_levels = 0, $unspent_feats = 0, $unspent_skills = 0, $unspent_as = 0, $lvl=0)
    {

        $this->STR = $str;
        $this->DEX = $dex;
        $this->CON = $con;
        $this->INTe = $inte;
        $this->WIS = $wis;
        $this->CHA = $cha;

        $this->level = $level;
        $this->size = $size;
        $this->hP = $hP;
        $this->dR = $dR;
        $this->initiative = $initiative;
        $this->skills = $skills;
        $this->feats = $feats;
        $this->specialAbilities = $special_abilities;
        $this->languages = $languages;
        $this->xP = $XP;

        $this->unspent_as = $unspent_as;
        $this->unspent_feats = $unspent_feats;
        $this->unspent_levels = $unspent_levels;
        $this->unspent_skills = $unspent_skills;
        $this->lvl=$lvl;
    }

    /**
     * @var \MXZ\PCGBundle\Entity\AbilityScores
     */
    private $STR;

    /**
     * @var \MXZ\PCGBundle\Entity\AbilityScores
     */
    private $DEX;

    /**
     * @var \MXZ\PCGBundle\Entity\AbilityScores
     */
    private $CON;

    /**
     * @var \MXZ\PCGBundle\Entity\AbilityScores
     */
    private $INTe;

    /**
     * @var \MXZ\PCGBundle\Entity\AbilityScores
     */
    private $WIS;

    /**
     * @var \MXZ\PCGBundle\Entity\AbilityScores
     */
    private $CHA;

    /**
     * Set STR
     *
     * @param \MXZ\PCGBundle\Entity\AbilityScores $sTR
     * @return Characters
     */
    public function setSTR(\MXZ\PCGBundle\Entity\AbilityScores $sTR = null)
    {
        $this->STR = $sTR;

        return $this;
    }

    /**
     * Get STR
     *
     * @return \MXZ\PCGBundle\Entity\AbilityScores
     */
    public function getSTR()
    {
        return $this->STR;
    }

    /**
     * Set DEX
     *
     * @param \MXZ\PCGBundle\Entity\AbilityScores $dEX
     * @return Characters
     */
    public function setDEX(\MXZ\PCGBundle\Entity\AbilityScores $dEX = null)
    {
        $this->DEX = $dEX;

        return $this;
    }

    /**
     * Get DEX
     *
     * @return \MXZ\PCGBundle\Entity\AbilityScores
     */
    public function getDEX()
    {
        return $this->DEX;
    }

    /**
     * Set CON
     *
     * @param \MXZ\PCGBundle\Entity\AbilityScores $cON
     * @return Characters
     */
    public function setCON(\MXZ\PCGBundle\Entity\AbilityScores $cON = null)
    {
        $this->CON = $cON;

        return $this;
    }

    /**
     * Get CON
     *
     * @return \MXZ\PCGBundle\Entity\AbilityScores
     */
    public function getCON()
    {
        return $this->CON;
    }

    /**
     * Set INTe
     *
     * @param \MXZ\PCGBundle\Entity\AbilityScores $iNTe
     * @return Characters
     */
    public function setINTe(\MXZ\PCGBundle\Entity\AbilityScores $iNTe = null)
    {
        $this->INTe = $iNTe;

        return $this;
    }

    /**
     * Get INTe
     *
     * @return \MXZ\PCGBundle\Entity\AbilityScores
     */
    public function getINTe()
    {
        return $this->INTe;
    }

    /**
     * Set WIS
     *
     * @param \MXZ\PCGBundle\Entity\AbilityScores $wIS
     * @return Characters
     */
    public function setWIS(\MXZ\PCGBundle\Entity\AbilityScores $wIS = null)
    {
        $this->WIS = $wIS;

        return $this;
    }

    /**
     * Get WIS
     *
     * @return \MXZ\PCGBundle\Entity\AbilityScores
     */
    public function getWIS()
    {
        return $this->WIS;
    }

    /**
     * Set CHA
     *
     * @param \MXZ\PCGBundle\Entity\AbilityScores $cHA
     * @return Characters
     */
    public function setCHA(\MXZ\PCGBundle\Entity\AbilityScores $cHA = null)
    {
        $this->CHA = $cHA;

        return $this;
    }

    /**
     * Get CHA
     *
     * @return \MXZ\PCGBundle\Entity\AbilityScores
     */
    public function getCHA()
    {
        return $this->CHA;
    }

    public function addXP($xp)
    {

        $this->setXP($this->getXP() + $xp);
    }

    /**
     * @var integer
     */
    private $unspent_levels;

    /**
     * @var integer
     */
    private $unspent_feats;

    /**
     * @var integer
     */
    private $unspent_skills;


    /**
     * Set unspent_levels
     *
     * @param integer $unspentLevels
     * @return Characters
     */
    public function setUnspentLevels($unspentLevels)
    {
        $this->unspent_levels = $unspentLevels;

        return $this;
    }

    /**
     * Get unspent_levels
     *
     * @return integer
     */
    public function getUnspentLevels()
    {
        return $this->unspent_levels;
    }

    /**
     * Set unspent_feats
     *
     * @param integer $unspentFeats
     * @return Characters
     */
    public function setUnspentFeats($unspentFeats)
    {
        $this->unspent_feats = $unspentFeats;

        return $this;
    }

    /**
     * Get unspent_feats
     *
     * @return integer
     */
    public function getUnspentFeats()
    {
        return $this->unspent_feats;
    }

    /**
     * Set unspent_skills
     *
     * @param integer $unspentSkills
     * @return Characters
     */
    public function setUnspentSkills($unspentSkills)
    {
        $this->unspent_skills = $unspentSkills;

        return $this;
    }

    /**
     * Get unspent_skills
     *
     * @return integer
     */
    public function getUnspentSkills()
    {
        return $this->unspent_skills;
    }

    /**
     * @var integer
     */
    private $unspent_as;


    /**
     * Set unspent_as
     *
     * @param integer $unspentAs
     * @return Characters
     */
    public function setUnspentAs($unspentAs)
    {
        $this->unspent_as = $unspentAs;

        return $this;
    }

    /**
     * Get unspent_as
     *
     * @return integer
     */
    public function getUnspentAs()
    {
        return $this->unspent_as;
    }

    /**
     * @var array
     */
    private $level;

    /**
     * @var array
     */
    private $skills;

    /**
     * @var array
     */
    private $feats;


    /**
     * Set level
     *
     * @param array $level
     * @return Characters
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return array
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set skills
     *
     * @param array $skills
     * @return Characters
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set feats
     *
     * @param array $feats
     * @return Characters
     */
    public function setFeats($feats)
    {
        $this->feats = $feats;

        return $this;
    }

    /**
     * Get feats
     *
     * @return array
     */
    public function getFeats()
    {
        return $this->feats;
    }
    /**
     * @var integer
     */
    private $lvl;


    /**
     * Set lvl
     *
     * @param integer $lvl
     * @return Characters
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer 
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * @var \MXZ\UserBundle\Entity\User
     */
    private $player;


    /**
     * Set player
     *
     * @param \MXZ\UserBundle\Entity\User $player
     * @return Characters
     */
    public function setPlayer(\MXZ\UserBundle\Entity\User $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \MXZ\UserBundle\Entity\User 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
