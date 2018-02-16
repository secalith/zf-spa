<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'block_create_carousel' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/block/create/carousel/ajax/html',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Block\Controller',
                        'controller' => 'Carousel\Create',
                        'action'  => 'index',
                        'module' => 'block',
                        'submodule' => 'block',
                        'scenario'  => 'form',
                        'type' => 'carousel',
                        'output' => 'html',
                    ),
                ),
                'may_terminate' => true,
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Block\Controller\Carousel\Create' => 'Block\Controller\CreateCarouselController',
        ),
        'delegators' => array(
            'Block\Controller\CreateCarouselController' => array(
                'Common\Controller\Delegator\InitialDelegatorFactory',
                'InternalServices\Controller\Delegator\InternalServicesDelegator',
                'Configuration\Controller\Delegator\ConfigurationDelegator',
                'Form\Controller\Delegator\FormDelegatorFactory',
                'Form\Controller\Delegator\FormPostDelegatorFactory',
                'Form\Controller\Delegator\FormViewDelegatorFactory',
            ),
        ),
        'internal_services' => array(
            'Block\Controller\CreateCarouselController' => array(
                'index' => array(
                    'form' => array(
                        'auth' => 'Auth\Service\Auth',
                        'authStorage' => 'Auth\Service\AuthStorage',
                        'formManager' => 'Form\Service\Form',
                        'arrayUtils' => 'ArrayUtils',
                        'dataSelector' => 'DataSelector\Service',
                    ),
                ),
            ),
        ),
    ),
    'form_elements' => [
        'spec' => [
            'block_create_carousel' => [
                'name'=>'block_create_carousel',
                'type' => 'Zend\Form\Form',
                'attributes' => [
                    'method' => 'post',
                    'action'=>'/block/create'
                ],
                'elements' => [
                    [
                        'spec' => [
                            'name' => 'block_create_carousel',
                            'type' => 'Block\Form\Fieldset\CreateFoundationFieldset',
                            'options' => [
                                'use_as_base_fieldset' => true,
                            ],
                        ],
                    ],
                ],
                /*
                'fieldsets' => array(
                    0 => [
                        'spec' => array(
                            'name' => 'basic',
                            'type' => 'Zend\\Form\\Element\\Collection',
                            'hydrator' => 'Zend\\Hydrator\\ClassMethods',
                            'object' => 'Zend\\Form\\Fieldset',
                            'elements' => array(
                                0 => [
                                    'spec' => [
                                        'type' => 'select',
                                        'name' => 'format_output',
                                        'options' => [
                                            'label' => 'Form Output Type',
                                            'label_attributes' => [
                                                'for'  => 'create-basic-form_output_type',
                                            ],
                                            'value_options' => [
                                                'phpArray' => 'phpArray',
                                                'json' => 'JSON',
                                            ],
                                        ],
                                        'attributes' => [
                                            'class' => 'form-control',
                                            'id'  => 'create-basic-form_output_type',
                                        ],
                                    ],
                                ],
                            ),
                        ),
                        'input_filter' => [],
                    ],
                ),
                */
                'input_filter' => [],
            ],
        ],
    ],
);
