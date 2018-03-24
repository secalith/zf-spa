<?php

namespace User\Form;

//use FormCollections\Entity\Product;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class CredentialsFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('credentials');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
//            ->setObject(new Product())
        ;

        $this->add(array(
            'type'  => 'password',
            'name' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'type' => 'password',
            'name' => 'password_confirm',
            'options' => array(
                'label' => 'Confirm',
            ),
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
            'password' => [
                'required' => true,
            ],
            'password_confirm' => [
                'required' => true,
            ],
        ];
    }
}
