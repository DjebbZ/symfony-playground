<?php

namespace Djebbz\TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, array('required' => true));
        $builder->add('description', null, array('required' => true));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Djebbz\TicketBundle\Model\Ticket'
        ));
    }

    public function getName()
    {
        return 'ticket';
    }
}