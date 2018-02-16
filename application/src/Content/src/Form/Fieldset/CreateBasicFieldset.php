<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Content\Form\Fieldset;

use Content\Model\Entity as Entity;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\InputFilter\InputFilterProviderInterface;

class CreateBasicFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct($name = 'content_create', $options = [])
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethodsHydrator(true))
            ->setObject(new Entity())
        ;

        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Internal Name',
                'label_attributes' => array(
                    'for'  => 'page-create-name',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id'  => 'page-create-name',
            ),
        ));

        $this->add(array(
            'name' => 'html',
            'type' => 'textarea',
            'options' => array(
                'label' => 'HTML',
                'label_attributes' => array(
                    'for'  => 'page-create-name',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id'  => 'page-create-name',
            ),
        ));

        $this->add(array(
            'type' => 'checkbox',
            'name' => 'content_cache',
            'options' => array(
                'label' => 'Content Cache',
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
            'name' => [
                'required' => true,
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

            'theme' => [
                'required' => true,
                'filters' => [['name' => 'StringTrim',['name' => 'StripTags']],],
                'validators' => [[
                    'name'=>'StringLength',
                    'options'=>[
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 255,
                    ]]
                ],
            ],
            'variant' => [
                'required' => true,
                'filters' => [['name' => 'StringTrim',['name' => 'StripTags']],],
                'validators' => [[
                    'name'=>'StringLength',
                    'options'=>[
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 255,
                    ]]
                ],
            ],
            'template' => [
                'required' => true,
                'filters' => [['name' => 'StringTrim',['name' => 'StripTags']],],
                'validators' => [[
                    'name'=>'StringLength',
                    'options'=>[
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 255,
                    ]]
                ],
            ],
        ];
    }
}
