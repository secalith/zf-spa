<?php

namespace Page;

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
                        'page' => [
                            'database' => [
                                'db' => [
                                    'table' => 'page',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
                                'service' => ["name"=>"Page\\Gateway",],
                                'hydrator' => [
                                    "class" => \Common\Hydrator\CommonTableEntityHydrator::class,
                                    "map" => [
                                        "uid" => "uid",
                                        "name" => "name",
                                        "template" => "template",
                                        "route" => "route",
                                        "pageCache" => "page_cache",
                                        "constraints" => "constraints",
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
                "Page\\Table" => \Page\Service\Factory\PageTableServiceFactory::class,
                "Page\\Gateway" => \Page\Service\Factory\PageTableGatewayFactory::class,
                "Page\\Service" => \Page\Service\Factory\PageServiceFactory::class,
            ],
        ];
    }

}
