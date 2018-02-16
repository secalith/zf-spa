<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'block_create' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/block/create/[:type]/ajax/html',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Block\Controller',
                        'controller' => 'Create',
                        'action'  => 'index',
                        'module' => 'block',
                        'submodule' => 'block',
                        'scenario'  => 'form',
                        'type' => 'html',
                        'output' => 'html',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'process' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/block/create/[:type]/ajax/html/process',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'type'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Block\Controller\Create' => 'Block\Controller\CreateController',
        ),
        'delegators' => array(
            'Block\Controller\CreateController' => array(
                'Common\Controller\Delegator\InitialDelegatorFactory',
                'InternalServices\Controller\Delegator\InternalServicesDelegator',
                'Configuration\Controller\Delegator\ConfigurationDelegator',
                'Form\Controller\Delegator\FormDelegatorFactory',
                'Form\Controller\Delegator\FormPostDelegatorFactory',
                'Form\Controller\Delegator\FormViewDelegatorFactory',
            ),
        ),
        'internal_services' => array(
            'Block\Controller\CreateController' => array(
                'index' => array(
                    'form' => array(
                        'auth' => 'Auth\Service\Auth',
                        'authStorage' => 'Auth\Service\AuthStorage',
                        'formManager' => 'Form\Service\Form',
                        'arrayUtils' => 'ArrayUtils',
                        'dataSelector' => 'DataSelector\Service',
                    ),
                ),
                'process' => array(
                    'login' => array(
                        'auth' => 'Auth\Service\Auth',
                        'authStorage' => 'Auth\Service\AuthStorage',
                        'formManager' => 'Form\Service\Form',
                        'arrayUtils' => 'ArrayUtils',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Block\Model' => 'Block\Model\Model',
        ),
        'factories' => array(
            "Block\\Table" => 'Block\Service\Factory\BlockTableServiceFactory',
            "Block\\Gateway" => 'Block\Service\Factory\BlockTableGatewayFactory',
        ),
    ),
    'application' => array(
        'module' => array(
            'application' => [
                'application' => [
                    'block' => [
                        'database' => array(
                            'db' => array(
                                'table' => 'block',
                            ),
                        ),
                        'service_gateway' => "Block\\Gateway",
                    ],
                ],
            ],
            'block' => array(
                'block' => array(
                    'form' => array(
                        'index' => array(
                            'form' => array(
                                'content' => array(
                                    'block_create' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                    'block_create_api' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                    'block_create_carousel' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                    'block_create_form' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                    'block_create_html' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                    'create_image' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                    'block_create_menu' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                    'block_collection' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                ),
                            ),
                        ),
                        'process' => array(
                            'create' => array(
                                'content' => array(
                                    'block_create' => array(
                                        'fieldsets' => array("basic"),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'route' => array(
                'route' => array(
                    'block' => array(
                        'database' => array(
                            'db' => array(
                                'table' => 'block',
                            ),
                        ),
                        'model' => 'Block\Model',
                        'service_gateway' => 'Block\Service\TableGateway',
                    ),
                ),
            ),
            'content' => array(
                'content' => array(
                    'block' => array(
                        'database' => array(
                            'db' => array(
                                'table' => 'block',
                            ),
                        ),
                        'model' => 'Block\Model',
                        'service_gateway' => 'Block\Service\TableGateway',
                    ),
                ),
            ),
        ),
    ),
);
