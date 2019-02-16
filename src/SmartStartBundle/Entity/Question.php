<?php

namespace SmartStartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="SmartStartBundle\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="reponse", type="integer")
     */
    private $reponse;

    /**
     * @var string
     *
     * @ORM\Column(name="choix", type="string", length=255)
     */
    private $choix;
    /**
     * @ORM\ManyToOne(targetEntity="SmartStartBundle\Entity\Challenge")
     * @ORM\JoinColumn(name="IdChallenge",referencedColumnName="id")
     */
    private $challenge;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Question
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set reponse
     *
     * @param integer $reponse
     *
     * @return Question
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return int
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set choix
     *
     * @param string $choix
     *
     * @return Question
     */
    public function setChoix($choix)
    {
        $this->choix = $choix;

        return $this;
    }

    /**
     * Get choix
     *
     * @return string
     */
    public function getChoix()
    {
        return $this->choix;
    }

    /**
     * Set challenge
     *
     * @param \SmartStartBundle\Entity\Challenge $challenge
     *
     * @return Question
     */
    public function setChallenge(\SmartStartBundle\Entity\Challenge $challenge = null)
    {
        $this->challenge = $challenge;

        return $this;
    }

    /**
     * Get challenge
     *
     * @return \SmartStartBundle\Entity\Challenge
     */
    public function getChallenge()
    {
        return $this->challenge;
    }
}
