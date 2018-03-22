<?php

namespace Auth\Form;

use Zend\Form\Element;
use \Zend\Form\Form;

class UserForm extends Form
{

    public function __construct()
    {

        parent::__construct();

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
        $this->add(array(
            'name' => 'subject',
            'options' => array(
                'label' => 'Subject',
            ),
            'type'  => 'Text',
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
}