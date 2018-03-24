<?php

namespace User\Form;

use FormCollections\Entity\Product;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;

class BasicFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('basic');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
//            ->setObject(new Product())
        ;

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Full name',
            ),
            'type'  => 'Text',
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'options' => array(
                'label' => 'Email address',
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
            'name' => [
                'required' => true,
            ],
            'email' => [
                'required' => true,
            ],
        ];
    }
}
