<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('AreaOfStudy', TextType::class,array('attr' => array('placeholder'=>'Area of study, eg:Accounting'),'required' => true))->add('degree', ChoiceType::class,['choices' => ['Choose degree'=>'Choose degree','Associate degree'=>'Associate degree','Bachelor degree'=>'Bachelor degree','Master degree'=>'Master degree','PHD'=>'PHD']])->add('country', ChoiceType::class,
        ['choices' => ['Choose country'=>'Choose country','cameroon'=>'cameroon', 'south africa'=>'south africa', 'senegal' =>'senegal','togo'=>'togo']],array('attr' => array('name' => 'country'), 'required' => true));
       
    }/**
     * {@inheritdoc}
     */
   


}