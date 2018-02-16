<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block\Form\Fieldset;

use Page\Entity\PageEntity as Entity;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\InputFilter\InputFilterProviderInterface;

class CreateBasicFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name = 'block_create_basic', $options = [])
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethodsHydrator(true))
            ->setObject(new Entity())
        ;

        $this->add(array(
            'name' => 'block_uid',
            'type' => 'text',
            'options' => array(
                'label' => 'Block UID',
                'label_attributes' => array(
                    'for'  => 'page-create-block-block-uid',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id'  => 'page-create-block-block-uid',
            ),
        ));

        $this->add(array(
            'type' => 'checkbox',
            'name' => 'block_cache',
            'options' => array(
                'label' => 'Block Cache',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0'
            ),
            'attributes' => array(
                'value' => '0'
            )
        ));

        return $this;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return [
            'block_uid' => [
                'required' => false,
                'filters' => [['name' => 'StringTrim',['name' => 'StripTags']],],
                'validators' => [[
                    'name'=>'StringLength',
                    'options'=>[
                        'encoding' => 'UTF-8',
                        'min'      => 3,
                        'max'      => 255,
                    ]]
                ],
            ],
        ];
    }
}
