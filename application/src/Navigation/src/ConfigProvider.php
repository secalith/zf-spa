<?php

namespace Navigation;

/**
 * The configuration provider for the Navigation module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'view_helpers' => [
                'factories' => [
//                    View\Helper\Menu::class => View\Helper\MenuFactory::class,
//                    View\Helper\Breadcrumbs::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
//                ],
//                'aliases' => [
//                    'mainMenu' => View\Helper\Menu::class
                ]
            ]
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
//                Service\NavigationManager::class => Service\NavigationManagerFactory::class,
            ],
        ];
    }
}
