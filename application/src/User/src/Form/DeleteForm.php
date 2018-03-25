<?php

namespace User\Form;

use Zend\Form\Element;
use \Zend\Form\Form;

class DeleteForm extends Form
{

    public function __construct()
    {

        parent::__construct();

        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'allow_oauth',
            'options' => array(
                'label' => 'Remove or deactivate?',
                'value_options' => array(
                    'deactivate' => 'Deactivate',
                    'remove' => 'Permanently remove',
                ),
            )
        ));

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