<?php

namespace User\Form;

use FormCollections\Entity\Product;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class RequestVerificationEmailFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('email_verification');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
//            ->setObject(new Product())
        ;

        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'email_verification',
            'options' => array(
                'label' => 'Request email verification?',
                'value_options' => array(
                    '0' => 'No',
                    '1' => 'Yes, send verification email',
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
