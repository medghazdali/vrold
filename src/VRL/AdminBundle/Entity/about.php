<?php

namespace VRL\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * about
 *
 * @ORM\Table(name="about")
 * @ORM\Entity(repositoryClass="VRL\AdminBundle\Repository\aboutRepository")
 */
class about
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
    *@ORM\ManyToOne(targetEntity="\VRL\AdminBundle\Entity\website")
    *@ORM\JoinColumn(name="website_id",referencedColumnName="id")
    */
    private $website;

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
     * Set description
     *
     * @param string $description
     *
     * @return about
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
     * Set website
     *
     * @param \VRL\AdminBundle\Entity\website $website
     *
     * @return about
     */
    public function setWebsite(\VRL\AdminBundle\Entity\website $website = null)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return \VRL\AdminBundle\Entity\website
     */
    public function getWebsite()
    {
        return $this->website;
    }
}
