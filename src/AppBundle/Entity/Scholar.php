<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity
 * @ORM\Table(name="scholar")
 * @Vich\Uploadable
 */
class Scholar extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="date_of_birth", type="date", nullable=true)
     * @var \DateTime
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(name="sex",type="string", length=255, nullable=true)
     * @var string
     */
    private $sex;

     /**
     * @ORM\Column(name="phone_number", type="phone_number", nullable=true)
     */
    private $phoneNumber;

    
    /**
     * @ORM\Column(name="current_address", type="string", length=255, nullable=true)
     * @var string
     */
    private $currentAddress;

     /**
     * @ORM\Column(name="current_country_study", type="string", length=255, nullable=true)
     * @var string
     */
    private $currentCountryOfStudy;

    /**
     * @ORM\Column(name="target_country_study", type="string", length=255, nullable=true)
     * @var string
     */
    private $targetCountryOfStudy;

     /**
     * @ORM\Column(name="recent_school_study", type="string", length=255, nullable=true)
     * @var string
     */
    private $recentSchoolStudy;

     /**
     * @ORM\Column(name="recent_level_study", type="string", length=255, nullable=true)
     * @var string
     */
    private $recentLevelStudy;

    /**
     * @ORM\Column(name="appreciation", type="string", length=255, nullable=true)
     * @var string
     */
    private $appreciation;

    /**
     * @ORM\Column(name="target_degree", type="string", length=255, nullable=true)
     * @var string
     */
    private $targetDegree;

     /**
     * @ORM\Column(name="current_study_area", type="string", length=255, nullable=true)
     * @var string
     */
    private $currentStudyArea;

    /**
     * @ORM\Column(name="target_study_area", type="string", length=255, nullable=true)
     * @var string
     */
    private $targetStudyArea;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $scholarProfile;

    /**
     * @Vich\UploadableField(mapping="scholars_profiles", fileNameProperty="scholarProfile")
     * @var File
     */
    private $scholarProfileFile;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     * @var \DateTime
     */
    private $updatedAt;



    

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Scholar
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Scholar
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set phoneNumber
     *
     * @param phone_number $phoneNumber
     *
     * @return Scholar
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set residenceCountry
     *
     * @param string $residenceCountry
     *
     * @return Scholar
     */
    public function setResidenceCountry($residenceCountry)
    {
        $this->residenceCountry = $residenceCountry;

        return $this;
    }

    /**
     * Get residenceCountry
     *
     * @return string
     */
    public function getResidenceCountry()
    {
        return $this->residenceCountry;
    }

    /**
     * Set currentAddress
     *
     * @param string $currentAddress
     *
     * @return Scholar
     */
    public function setCurrentAddress($currentAddress)
    {
        $this->currentAddress = $currentAddress;

        return $this;
    }

    /**
     * Get currentAddress
     *
     * @return string
     */
    public function getCurrentAddress()
    {
        return $this->currentAddress;
    }

    /**
     * Set currentCountryOfStudy
     *
     * @param string $currentCountryOfStudy
     *
     * @return Scholar
     */
    public function setCurrentCountryOfStudy($currentCountryOfStudy)
    {
        $this->currentCountryOfStudy = $currentCountryOfStudy;

        return $this;
    }

    /**
     * Get currentCountryOfStudy
     *
     * @return string
     */
    public function getCurrentCountryOfStudy()
    {
        return $this->currentCountryOfStudy;
    }

     /**
     * Set targetCountryOfStudy
     *
     * @param string $targetCountryOfStudy
     *
     * @return Scholar
     */
    public function setTargetCountryOfStudy($targetCountryOfStudy)
    {
        $this->targetCountryOfStudy = $targetCountryOfStudy;

        return $this;
    }

    /**
     * Get targetCountryOfStudy
     *
     * @return string
     */
    public function getTargetCountryOfStudy()
    {
        return $this->targetCountryOfStudy;
    }


    /**
     * Set targetDegree
     *
     * @param string $targetDegree
     *
     * @return Scholar
     */
    public function setTargetDegree($targetDegree)
    {
        $this->targetDegree = $targetDegree;

        return $this;
    }
    
    /**
     * Get targetDegree
     *
     * @return string
     */
    public function getTargetDegree()
    {
        return $this->targetDegree;
    }

    /**
     * Set recentSchoolStudy
     *
     * @param string $recentSchoolStudy
     *
     * @return Scholar
     */
    public function setRecentSchoolStudy($recentSchoolStudy)
    {
        $this->recentSchoolStudy = $recentSchoolStudy;

        return $this;
    }
    
    /**
     * Get recentSchoolStudy
     *
     * @return string
     */
    public function getRecentSchoolStudy()
    {
        return $this->recentSchoolStudy;
    }

     /**
     * Set recentLevelStudy
     *
     * @param string $recentLevelStudy
     *
     * @return Scholar
     */
    public function setRecentLevelStudy($recentLevelStudy)
    {
        $this->recentLevelStudy = $recentLevelStudy;

        return $this;
    }
    
    /**
     * Get recentLevelStudy
     *
     * @return string
     */
    public function getRecentLevelStudy()
    {
        return $this->recentLevelStudy;
    }
    

      /**
     * Set appreciation
     *
     * @param string $appreciation
     *
     * @return Scholar
     */
    public function setAppreciation($appreciation)
    {
        $this->appreciation = $appreciation;

        return $this;
    }
    
    /**
     * Get appreciation
     *
     * @return string
     */
    public function getAppreciation()
    {
        return $this->appreciation;
    }



     /**
     * Set currentStudyArea
     *
     * @param string $currentStudyArea
     *
     * @return Scholar
     */
    public function setCurrentStudyArea($currentStudyArea)
    {
        $this->currentStudyArea = $currentStudyArea;

        return $this;
    }
    
    /**
     * Get currentStudyArea
     *
     * @return string
     */
    public function getCurrentStudyArea()
    {
        return $this->currentStudyArea;
    }

    /**
     * Set targetStudyArea
     *
     * @param string $targetStudyArea
     *
     * @return Scholar
     */
    public function setTargetStudyArea($targetStudyArea)
    {
        $this->targetStudyArea = $targetStudyArea;

        return $this;
    }

    /**
     * Get targetStudyArea
     *
     * @return string
     */
    public function getTargetStudyArea()
    {
        return $this->targetStudyArea;
    }


    public function setScholarProfileFile(File $scholarProfile = null)
    {
        $this->scholarProfileFile = $scholarProfile;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($scholarProfile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getScholarProfileFile()
    {
        return $this->scholarProfileFile;
    }

    public function setScholarProfile($scholarProfile)
    {
        $this->scholarProfile = $scholarProfile;
    }

    public function getScholarProfile()
    {
        return $this->scholarProfile;
    }
}
