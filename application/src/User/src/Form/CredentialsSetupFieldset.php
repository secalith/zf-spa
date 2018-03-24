<?php

namespace User\Form;

//use FormCollections\Entity\Product;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class CredentialsSetupFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('credentials_setup');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
//            ->setObject(new Product())
        ;

        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'credentials_3d_security',
            'options' => array(
                'label' => '3d Security',
                'value_options' => array(
                    '0' => 'Disabled',
                    '1' => 'Enabled',
                ),
            )
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'credentials_3d_security_mobile',
            'options' => array(
                'label' => 'Mobile',
            )
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'allow_oauth',
            'options' => array(
                'label' => 'Allow Open Access?',
                'value_options' => array(
                    'manual' => 'No',
                    'email' => 'Yes, allow user to login with external services.',
                ),
            )
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'password_setup',
            'options' => array(
                'label' => 'Password',
                'value_options' => array(
                    'manual' => 'Manual',
                    'email' => 'Send the password request email',
                ),
            )
        ));

    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'password_setup' => [
                'required' => true,
            ],
        ];
    }
}
