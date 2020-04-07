<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ShareFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fromEmail', TextType::class,array('attr' => array('placeholder'=>'Enter your email'),'required' => true))
        ->add('toEmail', TextType::class,array('attr' => array('placeholder'=>'Enter destination email'),'required' => true))
        ->add('message', TextareaType::class,array('attr' => array('placeholder'=>'say anything to you friend'),'required' => true))
        ->add('schoolName',HiddenType::class)->add('website',HiddenType::class)->add('AreaOfStudy',HiddenType::class)
        ->add('degree',HiddenType::class)->add('country',HiddenType::class);
    
    }/**
     * {@inheritdoc}
     */
   


}