<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block\Form\Fieldset;

use Block\Entity\CreateBlockEntity as Entity;
use Page\Model\Model as Model;
use Zend\Form\Fieldset;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Zend\InputFilter\InputFilterProviderInterface;

class CreateImageFoundationFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * CreateFoundationFieldset constructor.
     * @param string $name
     * @param array $options
     */
    public function __construct($name = 'block_create', $options = [])
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethodsHydrator(true))
           // ->setObject(new Entity())
        ;

        $this->add(array(
            'type' => 'Block\Form\Fieldset\CreateBasicFieldset',
            'name' => 'content',
            'options' => array(
                'label' => 'Image',
            )
        ));

        $this->add(array(
            'type' => 'Block\Form\Fieldset\CreateBasicFieldset',
            'name' => 'block',
            'options' => array(
                'label' => 'Block',
            )
        ));

        $this->add(array(
            'type' => 'Rbac\Form\Fieldset\RbacFieldset',
            'name' => 'rbac',
            'options' => array(
                'label' => 'Roles',
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
        return [];
    }
}
