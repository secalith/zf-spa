<?php

namespace View;

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
            'delegators' => [
                \Page\Action\PageAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                ],
                \Page\Action\EditPageAction::class => [
                    \View\Controller\Delegator\PageViewDelegatorFactory::class,
                    \View\Controller\Delegator\EditPageViewDelegatorFactory::class,
                ],
            ],
        ];
    }

}
