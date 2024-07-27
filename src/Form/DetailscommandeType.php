<?php

namespace App\Form;

use App\Entity\Detailscommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailscommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numArticle')
            ->add('nomArticle')
            ->add('quantite')
            ->add('prixUnitaire')
            ->add('sousTotal')
            ->add('idCom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Detailscommande::class,
        ]);
    }
}
