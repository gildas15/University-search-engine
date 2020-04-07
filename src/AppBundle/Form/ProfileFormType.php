<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ProfileFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('scholarProfileFile', VichImageType::class, ['required' => false, 'allow_delete' => false, 'download_link' => true])
        ->add('username')->add('email')->add('dateOfBirth')->add('sex',ChoiceType::class,['choices' => ['choose your sex'=>'choose your sex','Male'=>'Male','Female'=>'Female']])
        ->add('phone_number', PhoneNumberType::class ,array('widget' => PhoneNumberType::WIDGET_COUNTRY_CHOICE))->add('currentAddress')
        ->add('currentCountryOfStudy',CountryType::class, array('placeholder' =>'choose your current country of study'))->add('recentSchoolStudy')
        ->add('recentLevelStudy', ChoiceType::class,['choices' => ['choose your recent level'=>'choose your recent level','Baccalaureat or O-level'=>'Baccalaureat or O-level','Associate degree'=>'Associate degree','Bachelor degree '=>'Bachelor degree ','Master degree '=>'Master degree ','Doctoral degree'=>'Doctoral degree','Profesional degree'=>'Profesional degree']])
        ->add('currentStudyArea',TextType::class, array('attr' => array('placeholder'=>'if your current level is baccalaureat or o-level describe your main courses')))
        ->add('appreciation',ChoiceType::class,['choices' => ['choose your performance'=>'choose your performance','Excellent'=>'Excellent','Very Good'=>'Very Good','Good'=>'Good','Pretty Good'=>'Pretty Good','Fair'=>'Fair','Fail'=>'Fail']])
        ->add('targetCountryOfStudy',ChoiceType::class,['choices' => ['choose your target country of study'=>'choose your target country of study','cameroon'=>'cameroon','mali'=>'mali','senegal'=>'senegal']])
        ->add('targetDegree',ChoiceType::class,['choices' => ['choose your degree'=>'choose your degree','Associate degree'=>'Associate degree','Bachelor degree '=>'Bachelor degree ','Master degree '=>'Master degree ','Doctoral degree'=>'Doctoral degree','Profesional degree'=>'Profesional degree']])
        ->add('targetStudyArea');
       
    }/**
     * {@inheritdoc}
     */
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Scholar'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }


}
