<?php

namespace Carnaval\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName','text', array(
                'label' => "Nom",
            ))
            ->add('firstName','text', array(
                'label' => "Prénom",
            ))
            ->add('email','text')
            ->add('telephone','text', array(
                'label' => "Téléphone",
                'required' => false,
            ))
            ->add('objet','text')
            ->add('message','textarea', array(
                'attr' => array('cols' => '75', 'rows' => '5'),
            ))
            ->add('security','text',array(
                'attr'=>array('style'=>'visibility:hidden;'),
                'label' => " ",
                'required' => false
            ))
        ;

        // On récupère la factory (usine)
        $factory = $builder->getFormFactory();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Carnaval\WebsiteBundle\Entity\Message'
        ));
    }

    public function getName()
    {
        return 'carnaval_websitebundle_messagetype';
    }
}