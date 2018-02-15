<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-helpers for the canonical source repository
 * @copyright Copyright (c) 2015-2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-helpers/blob/master/LICENSE.md New BSD License
 */

namespace Common\Helper;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Helper\Exception\MissingRouterException;

class RouteHelperFactory
{
    /**
     * Create a UrlHelper instance.
     *
     * @param ContainerInterface $container
     * @return RouteHelper
     * @throws MissingRouterException
     */
    public function __invoke(ContainerInterface $container)
    {
        if (! $container->has(RouterInterface::class)) {
            throw new MissingRouterException(sprintf(
                '%s requires a %s implementation; none found in container',
                RouteHelper::class,
                RouterInterface::class
            ));
        }

        return new RouteHelper($container->get(RouterInterface::class));
    }
}
