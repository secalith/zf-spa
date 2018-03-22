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
                        'block_form' => [
                            'database' => [
                                'db' => [
                                    'table' => 'block_form',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
//                                "adapter" => "Application\Db\DatabaseAdapter",
                                'service' => ["name"=>"Form\\Block\\Gateway"],
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
                        'form' => [
                            'database' => [
                                'db' => [
                                    'table' => 'form',
                                ],
                            ],
                            'gateway' => [
                                "adapter" => "Application\Db\LocalAdapter",
//                                "adapter" => "Application\Db\DatabaseAdapter",
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
                "Form\\Gateway" => \Form\Service\Factory\FormTableGatewayFactory::class,
                "Form\\Table" => \Form\Service\Factory\FormTableServiceFactory::class,
                "Form\\Block\\Gateway" => \Form\Service\Factory\FormBlockTableGatewayFactory::class,
                "Form\\Block\\Table" => \Form\Service\Factory\FormBlockTableServiceFactory::class,
            ],
        ];
    }

}
