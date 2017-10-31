<?php
namespace CalMenescal\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Nombre', 'required' => true))
            ->add('email', null, array('label' => 'Email', 'required' => true, 'constraints' => array(
                    new NotBlank(),
                    new Email())))
            ->add('message', 'textarea', array('label' => 'Mensaje', 'required' => true))
        ;
    }

    public function getName()
    {
        return 'calmenescal_mainbundle_contactotype';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        /*$resolver->setDefaults(array(
            'data_class' => 'ASBAE\PartnersBundle\Entity\Partner',
        ));*/
    }
}