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
            'block_create_api' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/block/create/api/ajax/html',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Block\Controller',
                        'controller' => 'Api\Create',
                        'action'  => 'index',
                        'module' => 'block',
                        'submodule' => 'block',
                        'scenario'  => 'form',
                        'type' => 'api',
                        'output' => 'html',
                    ),
                ),
                'may_terminate' => true,
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Block\Controller\Api\Create' => 'Block\Controller\CreateApiController',
        ),
        'delegators' => array(
            'Block\Controller\CreateApiController' => array(
                'Common\Controller\Delegator\InitialDelegatorFactory',
                'InternalServices\Controller\Delegator\InternalServicesDelegator',
                'Configuration\Controller\Delegator\ConfigurationDelegator',
                'Form\Controller\Delegator\FormDelegatorFactory',
                'Form\Controller\Delegator\FormPostDelegatorFactory',
                'Form\Controller\Delegator\FormViewDelegatorFactory',
            ),
        ),
        'internal_services' => array(
            'Block\Controller\ApiCreateController' => array(
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
            'block_create_api' => [
                'name'=>'block_create_api',
                'type' => 'Zend\Form\Form',
                'attributes' => [
                    'method' => 'post',
                    'action'=>'/block/create'
                ],
                'fieldsets' => array(
                    0 => [
                        'spec' => array(
                            'name' => 'basic',
                            'type' => 'Zend\\Form\\Fieldset',
                            'hydrator' => 'Zend\\Hydrator\\ClassMethods',
                            'object' => 'Zend\\Form\\Fieldset',
                            'elements' => array(
                                0 => [
                                    'spec' => [
                                        'type' => 'text',
                                        'name' => 'query',
                                        'options' => [
                                            'label' => 'API Query',
                                            'label_attributes' => [
                                                'for'  => 'create-block-api-query',
                                            ],
                                        ],
                                        'attributes' => [
                                            'class' => 'form-control',
                                            'id'  => 'create-block-api-query',
                                        ],
                                    ],
                                ],
                            ),
                        ),
                        'input_filter' => [],
                    ],
                    /*
                    1 => [
                        'spec' => array(
                            'name' => 'footer',
                            'type' => 'Zend\\Form\\Fieldset',
                            'hydrator' => 'Zend\\Hydrator\\ClassMethods',
                            'object' => 'Zend\\Form\\Fieldset',
                            'elements' => array(
                                0 => [
                                    'spec' => [
                                        'type' => 'submit',
                                        'name' => 'submit',
                                        'attributes' => [
                                            'value' => 'Submit',
                                            'id'  => 'create-block-api-query',
                                            'type' => 'submit',
                                            'class' => 'btn btn-success pull-right',
                                        ],
                                    ],
                                ],
                            ),
                        ),
                        'input_filter' => [],
                    ],
                    */
                ),
                'input_filter' => [],
            ],
        ],
    ],
);
