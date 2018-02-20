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
            'view_helpers' => [
                'invokables'=> [
                    'displayArea' => View\Helper\AreaHelper::class,
                ],
            ],
            'application' => [
                'module' => [
                    'route' => [
                        'area' => [
                            'database' => [
                                'db' => [
                                    'table' => 'area',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
                                'service' => ["name"=>"Area\\Gateway",],
                                'hydrator' => [
                                    "class" => \Common\Hydrator\CommonTableEntityHydrator::class,
                                    "map" => [
                                        "uid" => "uid",
                                        "template" => "uid",
                                        "machineName" => "machine_name",
                                        "attributes" => "attributes",
                                        "parameters" => "parameters",
                                        "options" => "options",
                                        "scope" => "scope",
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
                "Area\\Table" => \Area\Service\Factory\AreaTableServiceFactory::class,
                "Area\\Gateway" => \Area\Service\Factory\AreaTableGatewayFactory::class,
            ],
        ];
    }

}
