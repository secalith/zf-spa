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
                            'service_gateway' => "Route\\Gateway",
                        ],
                        'route_routes' => [
                            'database' => [
                                'db' => [
                                    'table' => 'route_routes',
                                ],
                            ],
                            'service_gateway' => "Route\\Routes\\Gateway",
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
