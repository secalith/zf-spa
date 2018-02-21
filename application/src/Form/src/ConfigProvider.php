<?php

namespace Form;

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
                        'formsd' => [
                            'database' => [
                                'db' => [
                                    'table' => 'form',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
                                'service' => ["name"=>"Form\\Gateway"],
                                'hydrator' => [
                                    "class" => \Common\Hydrator\CommonTableEntityHydrator::class,
                                    "map" => [
                                        "uid" => "uid",
                                        "block" => "block",
                                        "order" => "order",
                                        "content" => "content",
                                        "attributes" => "attributes",
                                        "parameters" => "parameters",
                                        "template" => "template",
                                        "type" => "type",
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
//                "Form\\Table" => \Content\Service\Factory\ContentTableServiceFactory::class,
//                "Form\\Gateway" => \Content\Service\Factory\ContentTableGatewayFactory::class,
            ],
        ];
    }

}
