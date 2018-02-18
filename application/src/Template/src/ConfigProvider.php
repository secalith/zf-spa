<?php

namespace Template;

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
                        'template' => [
                            'database' => [
                                'db' => [
                                    'table' => 'template',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
                                'service' => ["name"=>"Template\\Gateway",],
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
                "Template\\Table" => \Template\Service\Factory\TemplateTableServiceFactory::class,
                "Template\\Gateway" => \Template\Service\Factory\TemplateTableGatewayFactory::class,
            ],
        ];
    }

}
