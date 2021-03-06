<?php
namespace Mopa\Bundle\BootstrapSandboxBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class ExampleErrorsFormType extends AbstractType
{
    private $formErrors;
    
    public function __construct($formErrors = false) {
        $this->formErrors = $formErrors;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textfield1', 'text', array(
                'label' => 'Form sizes',
                'constraints' =>  new Length(array('min' => 5)),
                'attr' => array(
                    'class' => 'input-mini',
                    'placeholder' => 'input-mini',
                )
            ))
            ->add('textfield2', 'text', array(
                'label_render' => false,
                'constraints' =>  new Email(array('message' => 'Invalid email address')),
                'attr' => array(
                    'class' => 'input-medium',
                    'placeholder' => 'input-medium',
                )
            ))
            ->add('textfield3', 'text', array(
                'label_render' => false,
                'error_type' => "block",
                'constraints' =>  new Email(array('message' => 'Annother Invalid email address')),
                'attr' => array(
                    'class' => 'input-large',
                    'placeholder' => 'input-large',
                )
            ))
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
             // 'error_type' => "block" # uncomment this to change all of the error messages in this form to block
            'errors_on_forms' => $this->formErrors,
        ));
    }
    // ->setAttribute()
    public function getDefaultOptions(array $options)
    {
        return array(
                'csrf_protection' => false // just for demo purpose!
        );
    }
    public function getName()
    {
        return 'mopa_bootstrap_example_error_forms_' . ( ($this->formErrors) ? "form" : "" );
    }
}
