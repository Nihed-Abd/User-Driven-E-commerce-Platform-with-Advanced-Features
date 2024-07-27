<?php

namespace App\Form;

use App\Entity\Enchere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnchereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idclcreree')
            ->add('dateDebut')
            ->add('heured')
            ->add('dateFin')
            ->add('heuref')
            ->add('montantInitial')
            ->add('nomEnchere')
            ->add('montantFinal')
            ->add('image')
            ->add('idclenchere')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enchere::class,
        ]);
    }
}
