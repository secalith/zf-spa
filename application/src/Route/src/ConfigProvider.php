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
                        'database' => [
                            'db' => [
                                'table' => 'route',
                            ],
                        ],
                        'service_gateway' => "Route\\Gateway",
                    ],
                ],
            ], // application
        ];
    }

    public function getDependencies()
    {
        return [
            'factories'  => [
                "Route\\Table" => 'Route\Service\Factory\TableServiceFactory',
                "Route\\Gateway" => 'Route\Service\Factory\TableGatewayFactory',
                "Route\\Service" => 'Route\Service\Factory\RouteServiceFactory',
                "Router\\Listener" => 'Route\Listener\Factory\DatabaseRouteListenerFactory',
            ],
            'listeners' => array(
                "Router\\Listener"
            ),
        ];
    }

}
