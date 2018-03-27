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
//                                "adapter" => "Application\Db\DatabaseAdapter",
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
                    ], // route
                    'data_view' => [
                        'page.list' => [
                            'service' => "Page\\Table",
                            'method' => 'fetchAll',
                            'data_param' => 'pages',
                        ],
                    ], // data_view
                ], // module
            ], // application
        ];
    }

    public function getTemplates()
    {
        return [
            'paths' => [
                'page' => [__DIR__ . '/../templates/page'],
            ],
        ];
    }

    public function getDependencies()
    {
        return [
            'factories'  => [
                "Page\\Table" => \Page\Service\Factory\PageTableServiceFactory::class,
                "Page\\Gateway" => \Page\Service\Factory\PageTableGatewayFactory::class,
                "Page\\Service" => \Page\Service\Factory\PageServiceFactory::class,
                \Page\Action\PageAction::class => Action\PageFactory::class,
                \Page\Action\ListAction::class => Action\ListFactory::class,
                Action\EditPageAction::class => Action\EditPageFactory::class,
            ],
            'delegators' => [

//                \User\Action\CreateAction::class => [
//                    \Form\Delegator\FormDelegatorFactory::class,
//                    \Form\Delegator\FormFactoryDelegatorFactory::class,
//                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
//                    \TableData\Action\Delegator\CollectionViewDelegatorFactory::class,
//                ],
//                \User\Action\ReadAction::class => [
//                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
//                    \TableData\Action\Delegator\ItemViewDelegatorFactory::class,
//                ],
//                \User\Action\UpdateAction::class => [
//                    \Form\Delegator\FormDelegatorFactory::class,
//                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
//                    \TableData\Action\Delegator\ItemViewDelegatorFactory::class,
//                ],
//                \User\Action\DeleteAction::class => [
//                    \Form\Delegator\FormDelegatorFactory::class,
//                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
//                    \TableData\Action\Delegator\ItemViewDelegatorFactory::class,
//                ],
                \Page\Action\ListAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \TableData\Action\Delegator\CollectionViewDelegatorFactory::class,
                ],
//                \User\Action\ReadAction::class => [
//                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
//                    \TableData\Action\Delegator\CollectionViewDelegatorFactory::class,
//                ],
            ],
        ];
    }

}
