<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * university
 *
 * @ORM\Table(name="university")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\universityRepository")
 */
class university
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
     * @var string
     *
     * @ORM\Column(name="universityName", type="string", length=255, unique=true)
     */
    private $universityName;

    /**
     * @var string
     *
     * @ORM\Column(name="universityLogo", type="string", length=255, unique=true, nullable=true)
     */
    private $universityLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="contactEmail", type="string", length=255, unique=true)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="contactTelephone", type="string", length=255, nullable=true)
     */
    private $contactTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="domainName", type="string", length=255, unique=true)
     */
    private $domainName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;


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
     * @return university
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
     * Set universityName
     *
     * @param string $universityName
     *
     * @return university
     */
    public function setUniversityName($universityName)
    {
        $this->universityName = $universityName;

        return $this;
    }

    /**
     * Get universityName
     *
     * @return string
     */
    public function getUniversityName()
    {
        return $this->universityName;
    }

    /**
     * Set universityLogo
     *
     * @param string $universityLogo
     *
     * @return university
     */
    public function setUniversityLogo($universityLogo)
    {
        $this->universityLogo = $universityLogo;

        return $this;
    }

    /**
     * Get universityLogo
     *
     * @return string
     */
    public function getUniversityLogo()
    {
        return $this->universityLogo;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return university
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set contactTelephone
     *
     * @param string $contactTelephone
     *
     * @return university
     */
    public function setContactTelephone($contactTelephone)
    {
        $this->contactTelephone = $contactTelephone;

        return $this;
    }

    /**
     * Get contactTelephone
     *
     * @return string
     */
    public function getContactTelephone()
    {
        return $this->contactTelephone;
    }

    /**
     * Set domainName
     *
     * @param string $domainName
     *
     * @return university
     */
    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;

        return $this;
    }

    /**
     * Get domainName
     *
     * @return string
     */
    public function getDomainName()
    {
        return $this->domainName;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return university
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}

