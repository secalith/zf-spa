<?php

namespace Common\Helper;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Helper\Exception\MissingHelperException;

class RouteHelperMiddlewareFactory
{
    /**
     * Create and return a RouteHelperMiddleware instance.
     *
     * @param ContainerInterface $container
     * @return RouteHelperMiddleware
     * @throws MissingHelperException if the RouteHelper service is missing
     */
    public function __invoke(ContainerInterface $container)
    {
        if (! $container->has(RouteHelper::class)) {
            throw new MissingHelperException(sprintf(
                '%s requires a %s service at instantiation; none found',
                RouteHelperMiddleware::class,
                RouteHelper::class
            ));
        }

        return new RouteHelperMiddleware($container->get(RouteHelper::class));
    }
}
