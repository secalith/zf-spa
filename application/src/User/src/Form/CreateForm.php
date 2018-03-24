<?php

namespace User\Form;

use Zend\Form\Element;
use \Zend\Form\Form;

class CreateForm extends Form
{

    public function __construct()
    {

        parent::__construct();

        $this->add([
            'type' => 'User\Form\CreateFieldset',
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);


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