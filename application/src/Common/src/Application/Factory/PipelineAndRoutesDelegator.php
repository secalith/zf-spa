<?php

namespace Common\Application\Factory;

use Common\Helper\RouteHelperMiddleware as RouteHelperMiddleware;

use Zend\Expressive\Helper\ServerUrlMiddleware;
use Zend\Expressive\Helper\UrlHelperMiddleware;
use Zend\Expressive\Middleware\ImplicitHeadMiddleware;
use Zend\Expressive\Middleware\ImplicitOptionsMiddleware;
use Zend\Expressive\Middleware\NotFoundHandler;
use Zend\Stratigility\Middleware\ErrorHandler;

use Interop\Container\ContainerInterface;

class PipelineAndRoutesDelegator
{
    /**
     * @param ContainerInterface $container
     * @param string $name
     * @param callable $callback
     * @param array|null $options
     * @return callable|mixed
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var $app Application */
        $app = $callback();

        // Setup pipeline:
        $app->pipe(ErrorHandler::class);
        $app->pipe(ServerUrlMiddleware::class);
        $app->pipeRoutingMiddleware();
        $app->pipe(ImplicitHeadMiddleware::class);
        $app->pipe(ImplicitOptionsMiddleware::class);
        $app->pipe(UrlHelperMiddleware::class);
        $app->pipe(RouteHelperMiddleware::class);
        $app->pipeDispatchMiddleware();
        $app->pipe(NotFoundHandler::class);

        $e = $container->has("Route\\Table");


//        var_dump($e);
//
        $items = $container->get("Route\\Routes\\Table")
            ->fetchAll();

        foreach($items as $item){
//            var_dump($item);
        }


        $app->get('/', \App\Action\HomePageAction::class, 'home');
        $app->get('/api/ping', \App\Action\PingAction::class, 'api.ping');

        return $app;
    }
}