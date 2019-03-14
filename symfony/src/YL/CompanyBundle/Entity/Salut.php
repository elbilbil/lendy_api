<?php

namespace YL\CompanyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salut
 *
 * @ORM\Table(name="salut")
 * @ORM\Entity(repositoryClass="YL\CompanyBundle\Repository\SalutRepository")
 */
class Salut
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
     * @ORM\Column(name="a", type="string", length=255)
     */
    private $a;

    /**
     * @ORM\ManyToOne(targetEntity="YL\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;



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
     * Set a
     *
     * @param string $a
     *
     * @return Salut
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return string
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Set user
     *
     * @param \YL\UserBundle\Entity\User $user
     *
     * @return Salut
     */
    public function setUser(\YL\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \YL\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
