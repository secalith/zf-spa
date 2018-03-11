<?php
namespace Navigation\Service;

use Interop\Container\ContainerInterface;
use Navigation\Service\NavigationManager;
//use User\Service\RbacManager;

/**
 * This is the factory class for NavManager service. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class NavigationManagerFactory
{
    /**
     * This method creates the NavManager service and returns its instance.
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);

        $viewHelperManager = $container->get('ViewHelperManager');
        $urlHelper = $viewHelperManager->get('url');
        $rbacManager = null;//$container->get(RbacManager::class);

        return new NavigationManager($authService, $urlHelper, $rbacManager);
    }
}