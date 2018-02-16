<?php

namespace Block;

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
                        'block' => [
                            'database' => [
                                'db' => [
                                    'table' => 'block',
                                ],
                            ],
                            'service_gateway' => "Block\\Gateway",
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
                "Block\\Table" => \Block\Service\Factory\BlockTableServiceFactory::class,
                "Block\\Gateway" => \Block\Service\Factory\BlockTableGatewayFactory::class,
            ],
        ];
    }

}
