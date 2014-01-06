<?php

namespace Carnaval\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', 'entity', array(
                'class'    => 'CarnavalWebsiteBundle:CatagorieLiens',
                'property' => 'name',
                'multiple' => false,
                'expanded' => false,
                'label' => "Catégorie",
            ))
            ->add('name','text', array(
                'label' => "Nom",
            ))
            ->add('url','text', array(
                'label' => "URL",
            ))
            ->add('description','textarea', array(
                'label' => "Description",
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'medium' // Skip it if you want to use default theme
                )
            ))
        ;

        // On récupère la factory (usine)
        $factory = $builder->getFormFactory();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Carnaval\WebsiteBundle\Entity\Liens'
        ));
    }

    public function getName()
    {
        return 'carnaval_websitebundle_lientype';
    }
}