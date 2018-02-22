<?php

namespace Auth;

use Common\ConfigProvider as CommonConfigProvider;
use Zend\Authentication\AuthenticationService;

/**
 * The configuration provider for the Auth module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider extends CommonConfigProvider
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
            'invokables' => [],
            'factories' => [
                Action\LoginAction::class => Action\LoginActionFactory::class,
                AuthenticationService::class => Service\LocalAuthenticationServiceFactory::class,
                Adapter\LocalAuthAdapter::class => Adapter\LocalAuthAdapterFactory::class,
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
                'auth'    => [__DIR__ . '/../templates/auth'],
            ],
        ];
    }
}
