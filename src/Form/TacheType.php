<?php

namespace App\Form;

use App\Entity\Colaborateur;
use App\Entity\Tache;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TacheType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextareaType::class);
//            ->add('colaborateurs', CollectionType::class , [
//                'entry_type' => ColaborateurType::class,
//                'entry_options' => ['label' => false],
//                'label'=>false,
//                'by_reference' => false,
//                'allow_add' => true,
//                'allow_delete' => true,]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tache::class,
        ]);
    }
}