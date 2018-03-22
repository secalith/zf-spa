<?php

namespace Auth;

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
            'view_helpers' => [
                'invokables' => [
                    //  'displayBlock' => View\Helper\BlockHelper::class,
                ],
            ],
            'session_config' => [
                'cookie_lifetime' => 60*60*1,
                'gc_maxlifetime'     => 60*60*24*30,
            ],
            'session_manager' => [
                'validators' => [
                    RemoteAddr::class,
                    HttpUserAgent::class,
                ]
            ],
            // Session storage configuration.
            'session_storage' => [
                'type' => SessionArrayStorage::class
            ],
            'application' => $this->getApplicationConfig(),
        ];
    }

    public function getTemplates()
    {
        return [
            'paths' => [
                'user' => [__DIR__ . '/../templates/user'],
                'auth' => [__DIR__ . '/../templates/auth'],
            ],
        ];
    }

    public function getDependencies()
    {
        return [
            'factories' => [
                \Zend\Authentication\AuthenticationService::class
                    => \Auth\Service\Factory\AuthenticationServiceFactory::class,
                Action\ListUserAction::class => Action\ListUserFactory::class,
                Action\CreateUserAction::class => Action\CreateUserFactory::class,
                \Auth\Action\LoginProcessAction::class => \Auth\Action\LoginProcessFactory::class,
                \Auth\Service\AuthAdapter::class => \Auth\Service\Factory\AuthenticationAdapterFactory::class,
                "User\\Table" => \Auth\Service\Factory\UserTableServiceFactory::class,
                "User\\Gateway" => \Auth\Service\Factory\UserTableGatewayFactory::class,
                \Auth\Service\AuthManager::class => \Auth\Service\Factory\AuthenticationManagerFactory::class,
            ],
            'delegators' => [
                \Auth\Action\LoginProcessAction::class => [
                    \Form\Delegator\FormDelegatorFactory::class,
                    \Form\Delegator\FormFactoryDelegatorFactory::class,
                ],
                \Auth\Action\ListUserAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\DataViewDelegatorFactory::class,
                ],
                \Auth\Action\ReadUserAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\DataViewDelegatorFactory::class,
                ],
                \Auth\Action\CreateUserAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\DataViewDelegatorFactory::class,
                ],
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
                            "adapter" => "Application\Db\LocalAdapter",
//                                "adapter" => "Application\Db\DatabaseAdapter",
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
                        'form' => [
                            'user.create' => [
                                'form-003' => [
                                    'fdqn' => \Auth\Form\UserForm::class,
                                ],
                            ],
                        ],
                    ], // user
                ], // route
                'form' => [
                    'login_process' => [
                        'post' => [
                            [
                                'name' => 'form_login',
                                'fdqn' => \Auth\Form\LoginForm::class,
                            ],
                        ],
                    ],
                ],
            ], // module
        ];
    }

}
