<?php

namespace Auth;

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
                => Service\Factory\AuthenticationServiceFactory::class,
                Action\ListUserAction::class => Action\ListUserFactory::class,
                "User\\Table" => \Auth\Service\Factory\UserTableServiceFactory::class,
                "User\\Gateway" => \Auth\Service\Factory\UserTableGatewayFactory::class,
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
                    ], // user
                ], //
            ],
        ];
    }

}
