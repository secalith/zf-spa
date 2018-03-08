<?php

namespace App\Application\Factory;

use Common\Helper\RouteHelperMiddleware as RouteHelperMiddleware;

use Navigation\Navigation;
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

        $items = $container->get("Route\\Routes\\Table")->fetchAll();
        /* @var $item \Route\Model\RouteRoutesModel */
        foreach($items as $item) {
            $app->get($item->getRoute(), \Page\Action\PageAction::class, $item->getName());
        }

        $app->get('/edit/page/:uid',\Page\Action\EditPageAction::class,'page.edit');
        $app->get('/read/content/:uid',\Content\Action\ReadAction::class,'content.read');
        $app->get('/write/content/:uid',\Content\Action\WriteAction::class,'content.write');

        return $app;
    }
}