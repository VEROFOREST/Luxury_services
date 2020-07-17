<?php

namespace App\Form;

use App\Entity\Joboffer;
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
            ->add('client')
            ->add('sector')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Joboffer::class,
        ]);
    }
}
