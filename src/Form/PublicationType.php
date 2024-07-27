<?php

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;
class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('contenu', TextareaType::class, [
            'attr' => [
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Écrivez votre publication ici'
            ]
        ])
        ->add('photoFile', FileType::class, [
            'label' => 'Photo',
            'required' => true,
            'mapped' => false,
            'constraints' => [
                new Assert\NotBlank([         
                    'message' => 'Veuillez entrer une photo.',
                ])
            ],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
