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
