<?php

namespace Area;

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
                        'area' => [
                            'database' => [
                                'db' => [
                                    'table' => 'area',
                                ],
                            ],
                            'service_gateway' => "Area\\Gateway",
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
                "Area\\Table" => \Area\Service\Factory\AreaTableServiceFactory::class,
                "Area\\Gateway" => \Area\Service\Factory\AreaTableGatewayFactory::class,
            ],
        ];
    }

}
