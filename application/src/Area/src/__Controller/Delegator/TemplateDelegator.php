<?php

namespace Template\Controller\Delegator;

use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TemplateDelegator implements DelegatorFactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        return $this->createDelegatorWithName($container, $name, $name, $callback);
    }

    public function createDelegatorWithName(
        ServiceLocatorInterface $serviceLocator,
        $name,
        $requestedName,
        $callback
    ) {
        $targetInstance = $callback();

        if (null!==$targetInstance->getPage()) {
            // get page by route's UID
            $item = $serviceLocator->get("Template\\Table")->fetchBy(
                $targetInstance->getPage()->getTemplate(),
                'uid'
            );
            $targetInstance->setTemplate($item);
        }

        return $targetInstance;
    }
}
