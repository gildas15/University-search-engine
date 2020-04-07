<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * scholarUniversity
 *
 * @ORM\Table(name="scholar_university")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\scholarUniversityRepository")
 */
class scholarUniversity
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
     * @var \AppBundle\Entity\Scholar
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Scholar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scholarId", referencedColumnName="id")
     * })
     */
    private $scholarId;

    /**
     * @var \AppBundle\Entity\university
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\university")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="universityId", referencedColumnName="id")
     * })
     */
    private $universityId;


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
     * Set scholarId
     *
     * @param \AppBundle\Entity\Scholar $scholarId
     *
     * @return scholarUniversity
     */
    public function setScholarId(\AppBundle\Entity\Scholar $scholarId = null)
    {
        $this->scholarId = $scholarId;

        return $this;
    }

    /**
     * Get scholarId
     *
     * @return \AppBundle\Entity\Scholar
     */
    public function getScholarId()
    {
        return $this->scholarId;
    }

    /**
     * Set universityId
     *
     * @param AppBundle\Entity\university $universityId
     *
     * @return scholarUniversity
     */
    public function setUniversityId(AppBundle\Entity\university $universityId = null)
    {
        $this->universityId = $universityId;

        return $this;
    }

    /**
     * Get universityId
     *
     * @return AppBundle\Entity\university
     */
    public function getUniversityId()
    {
        return $this->universityId;
    }
}

