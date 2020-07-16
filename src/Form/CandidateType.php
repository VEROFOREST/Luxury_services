<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            // ->add('roles')
            ->add('password')
            ->add('gender')
            ->add('first_name')
            ->add('last_name')
            ->add('address')
            ->add('country')
            ->add('nationality')
            ->add('passport')
            ->add('is_passport_valid')
            ->add('profile_pic')
            ->add('cv')
            ->add('current_location')
            ->add('birth_date')
            ->add('birth_place')
            ->add('is_available')
            ->add('experience')
            ->add('description')
            ->add('created_at')
            ->add('updated_at')
            ->add('deleted_at')
            ->add('notes')
            ->add('files')
            ->add('sector')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
