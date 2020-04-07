<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * schoolCrawler
 *
 * @ORM\Table(name="school_crawler")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\schoolCrawlerRepository")
 */
class schoolCrawler
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
     * @ORM\Column(name="schoolName", type="string", length=255)
     */
    private $schoolName;

    /**
     * @var string
     *
     * @ORM\Column(name="schoolLogo", type="string", length=255)
     */
    private $schoolLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="schoolDomainName", type="string", length=255)
     */
    private $schoolDomainName;

    /**
     * @var array
     *
     * @ORM\Column(name="searchContent", type="array", nullable=true)
     */
    private $searchContent;


    /**
     * @var string
     *
     * @ORM\Column(name="tuitionContent", type="text", nullable=true)
     */
    private $tuitionContent;

    /**
     * @var string
     *
     * @ORM\Column(name="JobOfferingContent", type="text", nullable=true)
     */
    private $jobOfferingContent;

    /**
     * @var string
     *
     * @ORM\Column(name="internationalStundent", type="text", nullable=true)
     */
    private $internationalStundent;

    /**
     * @var string
     *
     * @ORM\Column(name="contactEmail", type="string", length=255)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;


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
     * Set schoolName
     *
     * @param string $schoolName
     *
     * @return schoolCrawler
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    /**
     * Get schoolName
     *
     * @return string
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * Set schoolLogo
     *
     * @param string $schoolLogo
     *
     * @return schoolCrawler
     */
    public function setSchoolLogo($schoolLogo)
    {
        $this->schoolLogo = $schoolLogo;

        return $this;
    }

    /**
     * Get schoolLogo
     *
     * @return string
     */
    public function getSchoolLogo()
    {
        return $this->schoolLogo;
    }

    /**
     * Set schoolDomainName
     *
     * @param string $schoolDomainName
     *
     * @return schoolCrawler
     */
    public function setSchoolDomainName($schoolDomainName)
    {
        $this->schoolDomainName = $schoolDomainName;

        return $this;
    }

    /**
     * Get schoolDomainName
     *
     * @return string
     */
    public function getSchoolDomainName()
    {
        return $this->schoolDomainName;
    }

    /**
     * Set searchContent
     *
     * @param array $searchContent
     *
     * @return schoolCrawler
     */
    public function setSearchContent($searchContent)
    {
        $this->searchContent = $searchContent;

        return $this;
    }

    /**
     * Get searchContent
     *
     * @return array
     */
    public function getSearchContent()
    {
        return $this->searchContent;
    }

   
    /**
     * Set tuitionContent
     *
     * @param string $tuitionContent
     *
     * @return schoolCrawler
     */
    public function setTuitionContent($tuitionContent)
    {
        $this->tuitionContent = $tuitionContent;

        return $this;
    }

    /**
     * Get tuitionContent
     *
     * @return string
     */
    public function getTuitionContent()
    {
        return $this->tuitionContent;
    }

    /**
     * Set jobOfferingContent
     *
     * @param string $jobOfferingContent
     *
     * @return schoolCrawler
     */
    public function setJobOfferingContent($jobOfferingContent)
    {
        $this->jobOfferingContent = $jobOfferingContent;

        return $this;
    }

    /**
     * Get jobOfferingContent
     *
     * @return string
     */
    public function getJobOfferingContent()
    {
        return $this->jobOfferingContent;
    }

    /**
     * Set internationalStundent
     *
     * @param string $internationalStundent
     *
     * @return schoolCrawler
     */
    public function setInternationalStundent($internationalStundent)
    {
        $this->internationalStundent = $internationalStundent;

        return $this;
    }

    /**
     * Get internationalStundent
     *
     * @return string
     */
    public function getInternationalStundent()
    {
        return $this->internationalStundent;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return schoolCrawler
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
     * Set country
     *
     * @param string $country
     *
     * @return schoolCrawler
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
}

