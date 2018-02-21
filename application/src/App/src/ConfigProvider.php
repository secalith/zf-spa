<?php

namespace App;

/**
 * The configuration provider for the App module
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
            'templates'    => $this->getTemplates(),
            'routes'    => $this->getRoutes(),
            'application'   =>  [
                'cache' => [
                    'database' => [
                        'enabled' => false,
                        'adapter' => [
//                    'name' => 'memcache',
                            'name' => 'filesystem',
                            'options' => [
                                'cache_dir' => 'data/cache/text',
                                'ttl' => 0,
                            ],
                        ],
                        'plugins' => [
                            'exception_handler' => [
                                'throw_exceptions' => false,
                            ],
                            'serializer',
                        ],
                    ],
                ],
            ],
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
            'factories'  => [
                Action\HomePageAction::class => Action\HomePageFactory::class,
            ],
            'delegators' => [
//                Action\HomePageAction::class => [
//                    \Form\Delegator\FormDelegatorFactory::class,
//                ],
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }

    public function getRoutes()
    {
        return [
            [
                'name'            => 'books',
                'path'            => '/api/books',
                'middleware'      => Action\HomePageAction::class,
                'allowed_methods' => ['GET'],
            ],
        ];
    }
}
