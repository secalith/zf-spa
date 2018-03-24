<?php

namespace Auth;

use Zend\Session\Storage\SessionArrayStorage;
use Zend\Session\Validator\RemoteAddr;
use Zend\Session\Validator\HttpUserAgent;
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
            'templates' => $this->getTemplates(),
            'view_helpers' => [
                'invokables' => [
                    //  'displayBlock' => View\Helper\BlockHelper::class,
                ],
                'factories' => [
                    'hasIdentity' => \Auth\View\Helper\HasIdentityFactory::class,
                    'getIdentity' => \Auth\View\Helper\GetIdentityFactory::class,
                ],
            ],
            'session_config' => [
                'cookie_lifetime' => 60*60*1,
                'gc_maxlifetime'     => 60*60*24*30,
            ],
            'session_manager' => [
                'validators' => [
                    RemoteAddr::class,
                    HttpUserAgent::class,
                ]
            ],
            // Session storage configuration.
            'session_storage' => [
                'type' => SessionArrayStorage::class
            ],
            'application' => $this->getApplicationConfig(),
        ];
    }

    public function getTemplates()
    {
        return [
            'paths' => [

                'auth' => [__DIR__ . '/../templates/auth'],
            ],
        ];
    }

    public function getDependencies()
    {
        return [
            'factories' => [
                \Zend\Authentication\AuthenticationService::class
                    => \Auth\Service\Factory\AuthenticationServiceFactory::class,
                \Auth\Action\LoginProcessAction::class => \Auth\Action\LoginProcessFactory::class,
                \Auth\Action\LogoutAction::class => \Auth\Action\LogoutFactory::class,
                \Auth\Service\AuthAdapter::class => \Auth\Service\Factory\AuthenticationAdapterFactory::class,
                \Auth\Service\AuthManager::class => \Auth\Service\Factory\AuthenticationManagerFactory::class,
                \Auth\Model\AuthStorage::class => \Auth\Model\AuthStorageFactory::class,
            ],
            'delegators' => [
                \Auth\Action\LoginProcessAction::class => [
                    \Form\Delegator\FormDelegatorFactory::class,
                    \Form\Delegator\FormFactoryDelegatorFactory::class,
                ],
            ],
        ];
    }

    public function getApplicationConfig()
    {
        return [
            'module' => [
                'form' => [
                    'login_process' => [
                        'post' => [
                            [
                                'name' => 'form_login',
                                'fdqn' => \Auth\Form\LoginForm::class,
                            ],
                        ],
                    ],
                ],
            ], // module
        ];
    }

}
