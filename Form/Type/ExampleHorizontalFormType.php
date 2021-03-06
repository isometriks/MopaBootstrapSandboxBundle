<?php
namespace Mopa\Bundle\BootstrapSandboxBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExampleHorizontalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Text_input', null, array(
                'help_block'  => 'In addition to freeform text, any HTML5 text-based input appears like so.',
            ))
            ->add('Text_input_ohne_label', null, array(
                'label_render' => false,
                'help_block'  => 'In addition this one has no label.',
            ))
            ->add('Checkboxes', 'choice', array(
                'label'        => 'Checkbox',
                'help_inline'  => 'Choice widget, expanded and multiple',
                'multiple'     => true,
                'expanded'     => true,
                'choices'      => array('1' => "Option one is this and that—be sure to include why it's great"),
            ))
            ->add('Select_list', 'choice', array(
                'label'        => 'Select list',
                'choices'      => array(
                    '1' => "something",
                    '2' => "2",
                    '3' => "3",
                    '4' => "4",
                    '5' => "5"
                ),
            ))
            ->add('Multicon-select', 'choice', array(
                'label'        => 'Multicon-select',
                'multiple'     => true,
                'choices'      => array(
                    '1' => "something",
                    '2' => "2",
                    '3' => "3",
                    '4' => "4",
                    '5' => "5"
                ),
            ))
            ->add('File', 'file', array(
            ))
            ->add('Textarea', 'textarea', array(
                'help_inline' => "Some inline help",
                'attr'  => array(
                    'class' => 'input-xlarge',
                    'rows'  => 3
                )
            ))
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'render_fieldset' => false,
            'show_legend' => false,
        ));
    }
    public function getName()
    {
        return "Controls_Bootstrap_supports";
    }
}
