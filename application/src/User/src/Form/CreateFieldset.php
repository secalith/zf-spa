<?php

namespace User\Form;

use FormCollections\Entity\Product;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class CreateFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('product');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
//            ->setObject(new Product())
        ;

        $this->add([
            'type' => 'User\Form\BasicFieldset',
            'name' => 'basic',
        ]);

        $this->add([
            'type' => 'User\Form\CredentialsSetupFieldset',
            'name' => 'credentials_setup',
        ]);
        $this->add([
            'type' => 'User\Form\CredentialsFieldset',
            'name' => 'credentials',
        ]);
        $this->add([
            'type' => 'User\Form\RequestVerificationEmailFieldset',
            'name' => 'email_verification',
        ]);
        $this->add([
            'type' => 'User\Form\EmailConfirmationFieldset',
            'name' => 'email_confirmation',
        ]);
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
