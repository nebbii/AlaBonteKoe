<?php

namespace Bontekoe\CinemaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShowschemaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datetime')
            ->add('cinema', 'entity', array(
                'empty_data' => null,
                'label' => 'Choice a cinemaroom',
                'class' => 'Bontekoe\CinemaBundle\Entity\Cinema',
                'choice_label' => function ($cinema) {
                    return $cinema->getNumber();
                }
            ))
            ->add('movie', 'entity', array(
                'empty_data' => null,
                'label' => 'Choice a movie',
                'class' => 'Bontekoe\CinemaBundle\Entity\Movie',
                'choice_label' => function ($movie) {
                    return $movie->getTitle() ." (". $movie->getProductioncompany() .")";
                }
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bontekoe\CinemaBundle\Entity\Showschema'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bontekoe_cinemabundle_showschema';
    }
}
