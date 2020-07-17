<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Sector;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('gender',ChoiceType::class,[
                'choices'=>[
                    'F'=> 'Féminin',
                    'M'=> 'Masculin',
                ],

            ])
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
            ->add('sector', EntityType::class, array(
                    'class' => Sector::class,
                    'choice_label' => 'name',
                    'multiple'  => false,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
