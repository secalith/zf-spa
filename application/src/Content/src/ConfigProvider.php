<?php

namespace Content;

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
                        'content' => [
                            'database' => [
                                'db' => [
                                    'table' => 'content',
                                ],
                            ],
                            'service_gateway' => "Content\\Gateway",
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
                "Content\\Table" => \Content\Service\Factory\ContentTableServiceFactory::class,
                "Content\\Gateway" => \Content\Service\Factory\ContentTableGatewayFactory::class,
            ],
        ];
    }

}
