<?php

namespace App\Form;

use App\Entity\Chaussure;
use App\Entity\Couleur;
use App\Repository\RegionRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ChaussureType extends AbstractType
{
    private $regionRepository;

    public function __construct(RegionRepository $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('description', TextareaType::class)
            ->add('prix', MoneyType::class)
            ->add('tailles', CollectionType::class , [
                'entry_type' => TailleType::class,
                'entry_options' => ['label' => false],
                'label'=>false,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,])
            ->add('couleurs');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chaussure::class,
        ]);
    }
}