<?php

namespace TableData;

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
