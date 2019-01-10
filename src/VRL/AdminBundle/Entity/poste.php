<?php

namespace VRL\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * poste
 *
 * @ORM\Table(name="poste")
 * @ORM\Entity(repositoryClass="VRL\AdminBundle\Repository\posteRepository")
 */
class poste
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
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;


    /**
     * @var string
     *
     * @ORM\Column(name="descrition", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=100, nullable=true)
     */
    private $autor;

 
    /**
     * @var string
     *
     * @ORM\Column(name="datecreation", type="datetime",nullable=true)
     */
    private $datecreation;


    /**
    *@ORM\ManyToOne(targetEntity="\VRL\AdminBundle\Entity\website")
    *@ORM\JoinColumn(name="website_id",referencedColumnName="id")
    */
    private $website;


    /**
    *@ORM\ManyToOne(targetEntity="\VRL\AdminBundle\Entity\cats")
    *@ORM\JoinColumn(name="cats_id",referencedColumnName="id")
    */
    private $cats;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;


    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;


    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents/poste';
    }

     /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }


    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }


    /**
     * Set path
     *
     * @param string $path
     *
     * @return Group
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
     * Set title
     *
     * @param string $title
     *
     * @return poste
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return poste
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
     * Set autor
     *
     * @param string $autor
     *
     * @return poste
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return poste
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Set website
     *
     * @param \VRL\AdminBundle\Entity\website $website
     *
     * @return poste
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

    /**
     * Set cats
     *
     * @param \VRL\AdminBundle\Entity\cats $cats
     *
     * @return poste
     */
    public function setCats(\VRL\AdminBundle\Entity\cats $cats = null)
    {
        $this->cats = $cats;

        return $this;
    }

    /**
     * Get cats
     *
     * @return \VRL\AdminBundle\Entity\cats
     */
    public function getCats()
    {
        return $this->cats;
    }
}
