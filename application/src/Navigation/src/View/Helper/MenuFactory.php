<?php
namespace Navigation\View\Helper;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Navigation\View\Helper\Menu;
use Navigation\Service\NavigationManager;

/**
 * This is the factory for Menu view helper. Its purpose is to instantiate the
 * helper and init menu items.
 */
class MenuFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $navManager = $container->get(NavigationManager::class);

        // Get menu items.
        $items = $navManager->getMenuItems();

        // Instantiate the helper.
        return new Menu($items);
    }
}
