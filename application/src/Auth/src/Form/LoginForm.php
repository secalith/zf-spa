<?php
namespace Auth;

use Zend\Form\Element;
use Zend\Form\Form;

class ContactForm extends Form
{

    public function __construct()
    {

        parent::__construct();

        $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'login',
            'options' => array(
                'label' => 'Login',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
            'type'  => 'password',
        ));


        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'remember',
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

    }
}