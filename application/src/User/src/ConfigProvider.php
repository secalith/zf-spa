<?php

namespace User;

use Zend\Session\Storage\SessionArrayStorage;
use Zend\Session\Validator\RemoteAddr;
use Zend\Session\Validator\HttpUserAgent;
use Common\ConfigProvider as CommonConfigProvider;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider extends CommonConfigProvider
{

    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            'application' => $this->getApplicationConfig(),
        ];
    }

    public function getTemplates()
    {
        return [
            'paths' => [
                'user' => [__DIR__ . '/../templates/user'],
            ],
        ];
    }

    public function getDependencies()
    {
        return [
            'factories' => [
                \User\Action\CreateAction::class => Action\CreateFactory::class,
                \User\Action\CreateProcessAction::class => Action\CreateProcessFactory::class,
                \User\Action\ReadAction::class => Action\ReadFactory::class,
                \User\Action\UpdateAction::class => Action\UpdateFactory::class,
                \User\Action\DeleteAction::class => Action\DeleteFactory::class,
                \User\Action\ListAction::class => Action\ListFactory::class,
                "User\\Table" => \User\Service\Factory\UserTableServiceFactory::class,
                "User\\Gateway" => \User\Service\Factory\UserTableGatewayFactory::class,
            ],
            'delegators' => [

                \User\Action\CreateAction::class => [
                    \Form\Delegator\FormDelegatorFactory::class,
//                    \Form\Delegator\FormFactoryDelegatorFactory::class,
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\CollectionViewDelegatorFactory::class,
                ],
                \User\Action\ReadAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\ItemViewDelegatorFactory::class,
                ],
                \User\Action\UpdateAction::class => [
                    \Form\Delegator\FormDelegatorFactory::class,
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\ItemViewDelegatorFactory::class,
                ],
                \User\Action\DeleteAction::class => [
                    \Form\Delegator\FormDelegatorFactory::class,
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\ItemViewDelegatorFactory::class,
                ],
                \User\Action\ListAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\CollectionViewDelegatorFactory::class,
                ],
//                \User\Action\ReadAction::class => [
//                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
//                    \TableData\Action\Delegator\CollectionViewDelegatorFactory::class,
//                ],
            ],
        ];
    }

    public function getApplicationConfig()
    {
        return [
            'module' => [
                'route' => [
                    'user' => [
                        'database' => [
                            'db' => [
                                'table' => 'user',
                            ],
                        ],
                        'gateway' => [
//                            "adapter" => "Application\Db\LocalAdapter",
//                            "adapter" => "Application\Db\DatabaseAdapter",
                            "adapter" => "Application\Db\UserDatabaseAdapter",
                            'service' => ["name"=>"User\\Gateway",],
                            'hydrator' => [
                                "class" => \Common\Hydrator\CommonTableEntityHydrator::class,
                                "map" => [
                                    "uid" => "uid",
                                    "email" => "email",
                                    "full_name" => "full_name",
                                    "password" => "password",
                                    "status" => "status",
                                    "date_created" => "date_created",
                                    "pwd_reset_token" => "pwd_reset_token",
                                    "pwd_reset_token_creation_date" => "pwd_reset_token_creation_date",
                                ],
                            ],
                        ], // gateway
                    ], // user
                ], // route
                'form' => [
                    'user.create' => [
                        'post' => [
                            [
                                'name' => 'user_create',
                                'fdqn' => \User\Form\CreateForm::class,
                            ],
                        ],
                    ],
                    'user.update' => [
                        'post' => [
                            [
                                'name' => 'user_update',
                                'fdqn' => \User\Form\CreateForm::class,
                            ],
                        ],
                    ],
                    'user.delete' => [
                        'post' => [
                            [
                                'name' => 'user_delete',
                                'fdqn' => \User\Form\DeleteForm::class,
                            ],
                        ],
                    ],
                ], // form
                'data_view' => [
                    'user.read' => [
                        'service' => "User\\Table",
                        'method' => 'getItem',
                        'data_param' => 'user',
                        'params' => [
                            [
                                'param_name' => 'uid',
                                'param_name_proxy' => 'uid',
                                'service' => \Common\Helper\RouteHelper::class,
                                'method' => 'getMatchedParam',
                            ],
                        ],
                    ],
                    'user.delete' => [
                        'service' => "User\\Table",
                        'method' => 'getItem',
                        'data_param' => 'user',
                        'params' => [
                            [
                                'param_name' => 'uid',
                                'param_name_proxy' => 'uid',
                                'service' => \Common\Helper\RouteHelper::class,
                                'method' => 'getMatchedParam',
                            ],
                        ],
                    ],
                    'user.list' => [
                        'service' => "User\\Table",
                        'method' => 'listAll',
                        'data_param' => 'users',
                    ],
                ], // data_view
            ], // module
        ];
    }

}
