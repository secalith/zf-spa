<?php
namespace Content\Form;

use Content\Model\ContentModel;
use Zend\InputFilter\InputFilter as InputFilter;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\Form\Form as Form;

class UpdateForm extends Form
{
    public function __construct()
    {
        parent::__construct('form');

        $this
            ->setAttribute('method', 'post')
            ->setAttribute('id', 'formCreate')
            ->setAttribute('class', 'form-collection')
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new ContentModel())
            ->setInputFilter(new InputFilter())
        ;

        $this->add([
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'content',
        ],['priority'=>0]);

        $this->add([
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
        ],['priority'=>20]);

        $this->add([
            'name' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'value' => 'Send',
                'class' => 'btn btn-success',
            ],
        ],['priority'=>0]);
    }
}
