<?php

namespace Auth;

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
                  //  'displayBlock' => View\Helper\BlockHelper::class,
                ],
            ],
        ];
    }

    public function getDependencies()
    {
        return [
            'factories'  => [
                \Zend\Authentication\AuthenticationService::class
                    => Service\Factory\AuthenticationServiceFactory::class,
                Action\ListUserAction::class => Action\ListUserFactory::class,
//                "Block\\Table" => \Block\Service\Factory\BlockTableServiceFactory::class,
//                "Block\\Gateway" => \Block\Service\Factory\BlockTableGatewayFactory::class,
            ],
        ];
    }

}
