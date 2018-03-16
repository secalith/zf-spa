<?php

namespace Route;

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
            'templates'    => $this->getTemplates(),
            'application' => [
                'module' => [
                    'route' => [
                        'route' => [
                            'database' => [
                                'db' => [
                                    'table' => 'route',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
//                                "adapter" => "Application\Db\DatabaseAdapter",
                                'service' => ["name"=>"Route\\Gateway",],
                                'hydrator' => [
                                    "class" => \Common\Hydrator\CommonTableEntityHydrator::class,
                                    "map" => [
                                        "routeName" => "route_name",
                                        "uid" => "uid",
                                    ],
                                ],
                            ],

                        ],
                        'route_routes' => [
                            'database' => [
                                'db' => [
                                    'table' => 'route_routes',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
//                                "adapter" => "Application\Db\DatabaseAdapter",
                                'service' => ["name"=>"Route\\Routes\\Gateway",],
                                'hydrator' => [
                                    "class" => \Common\Hydrator\CommonTableEntityHydrator::class,
                                    "map" => [
                                        "routeName" => "route_name",
                                        "uid" => "uid",
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ], // application
        ];
    }

    public function getDependencies()
    {
        return [
            'factories'  => [
                "Route\\Table" => \Route\Service\Factory\RouteTableServiceFactory::class,
                "Route\\Gateway" => \Route\Service\Factory\RouteTableGatewayFactory::class,
                "Route\\Service" => \Route\Service\Factory\RouteServiceFactory::class,
                "Route\\Routes\\Table" => \Route\Service\Factory\RouteRoutesTableServiceFactory::class,
                "Route\\Routes\\Gateway" => \Route\Service\Factory\RouteRoutesTableGatewayFactory::class,
                "Route\\Routes\\Service" => \Route\Service\Factory\RouteRoutesServiceFactory::class,
            ],
        ];
    }

}
