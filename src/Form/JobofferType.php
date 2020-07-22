<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Joboffer;
use App\Entity\Sector;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class JobofferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('description')
            ->add('is_activated')
            ->add('notes')
            ->add('job_title')
            ->add('job_type')
            ->add('location')
            ->add('closing_date')
            ->add('salary')
            ->add('created_at')
            ->add('client', EntityType::class, array(
                    'class' => Client::class,
                    'choice_label' => 'company_name',
                    'multiple'  => false,
                    ))
            ->add('sector', EntityType::class, array(
                    'class' => Sector::class,
                    
                    'choice_label' => 'name',
                    'multiple'  => false,
                ));
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Joboffer::class,
        ]);
    }
}
