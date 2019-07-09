<?php

namespace App\Form;

use App\Entity\Colaborateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ColaborateurType extends AbstractType
{

    public function __construct()
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('fonction', TextareaType::class)
            ->add('taches', CollectionType::class , [
                'entry_type' => TacheType::class,
                'entry_options' => ['label' => false],
                'label'=>false,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Colaborateur::class,
        ]);
    }
}