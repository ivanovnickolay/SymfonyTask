<?php

namespace TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name_task','text',array('label'=>'Название задачи'))
            ->add('begin_task','date',array('widget'=>'choice', 'format' => 'dd-MM-yyyy'))
            ->add('end_task','date',array('widget'=>'choice', 'format' => 'dd-MM-yyyy'))
            ->add('description')
            ->add('vajnoct')
            ->add('final')
            ->add('Category')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TaskBundle\Entity\Task'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'taskbundle_task';
    }
}
