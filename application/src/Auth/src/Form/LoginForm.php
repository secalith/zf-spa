<?php

namespace Auth\Form;

use Zend\Form\Element;
use \Zend\Form\Form;

class LoginForm extends Form
{

    public function __construct()
    {

        parent::__construct();

        $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'options' => array(
                'label' => 'Email address',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Password',
            'name' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'redirect_url',
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'remember_me',
            'options' => array(
                'label' => 'Remember me',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            )
        ));

        $this->add(new Element\Csrf('security'));

        $this->add(array(
            'name' => 'send',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
            ),
        ));

        // We could also define the input filter here, or
        // lazy-create it in the getInputFilter() method.
    }

    public function getInputFilterSpecification()
    {
        return array(
            'redirect_url' => array(
                'required' => false,
                'filters'  => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
            ),
            'remember_me' => array(
                'required' => true,
            ),
            'password' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
            ),
            'email' => array(
                'required' => true,
                'filters'  => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    new \Zend\Validator\Email(),
                ),
            ),
        );
    }
}