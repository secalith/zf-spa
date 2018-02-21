<?php

namespace Common;

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
            'view_helpers' => [
                'invokables'=> [
                    'openTag' => View\Helper\OpenTagHelper::class,
                    'closeTag' => View\Helper\CloseTagHelper::class,
                ],
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
            "factories" => [
                Helper\RouteHelper::class           => Helper\RouteHelperFactory::class,
                Helper\RouteHelperMiddleware::class => Helper\RouteHelperMiddlewareFactory::class,
            ],
            'delegators' => [
                \Zend\Expressive\Application::class => [
                    \App\Application\Factory\PipelineAndRoutesDelegator::class,
                ],
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
        return [];
    }
}
