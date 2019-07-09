<?php

namespace App\Form;

use App\Entity\Region;
use App\Entity\Taille;
use App\Repository\RegionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TailleType extends AbstractType
{
    private $regionRepository;

    public function __construct(RegionRepository $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('taille');
        $builder->add('region',ChoiceType::class ,[
            'choices' => [ 'regions' => $this->regionRepository->findAll()
            ],
            'choice_label' => function(Region $region) {
                                return strtoupper($region->getRegion());
                            }]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Taille::class,
        ]);
    }
}
