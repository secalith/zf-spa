<?php

namespace User\Form;

use FormCollections\Entity\Product;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class EmailConfirmationFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('email_confirmation');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
//            ->setObject(new Product())
        ;

        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'email_confirmation',
            'options' => array(
                'label' => 'Send Confirmation email',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
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
            'name' => [
                'required' => true,
            ],
            'price' => [
                'required' => true,
                'validators' => [
                    [
                        'name' => 'Float',
                    ],
                ],
            ],
        ];
    }
}
