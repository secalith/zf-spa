<?php

namespace App\Application\Factory;

use Common\Helper\RouteHelperMiddleware as RouteHelperMiddleware;

//use Navigation\Navigation;
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

        // obtain Routes from database
        $items = $container->get("Route\\Routes\\Table")->fetchAll();
        /* @var $item \Route\Model\RouteRoutesModel */
        foreach($items as $item) {
            $c = $item->getController();
            switch($item->getController()){
                case '\Auth\Action\LoginAction':
                    $app->get($item->getRoute(), \Auth\Action\LoginAction::class, $item->getName());
                    break;
                case '\Auth\Action\LoginProcessAction':
//                    $app->get($item->getRoute(), \Auth\Action\LoginAction::class, $item->getName());
                    $app->post($item->getRoute(), \Auth\Action\LoginProcessAction::class, $item->getName());
//                    $app->get('ddd', \Auth\Action\LoginAction::class, 'ssss');
//                    echo $item->getRoute();
//                    echo $item->getName();
//                    $app->get($item->getRoute(), \Auth\Action\LoginAction::class, $item->getName());

                    break;
                default:
                case '\Page\Action\PageAction':
                    $app->get($item->getRoute(), \Page\Action\PageAction::class, $item->getName());
                    break;

            }
//            $app->get($item->getRoute(), $container->get($c.'Factory'), $item->getName());
        }

        // content actions
        $app->get('/edit/page/:uid',\Page\Action\EditPageAction::class,'page.edit');
        $app->get('/read/content/:uid/:format',\Content\Action\ReadAction::class,'content.read');
        $app->get('/write/content/:uid',\Content\Action\WriteAction::class,'content.write');

        // user actions
//        $app->get('/user/create',\Auth\Action\CreateUserAction::class,'user.create');
//        $app->get('/user/read/:uid',\Auth\Action\ReadUserAction::class,'user.read');
//        $app->get('/user/update/:uid',\Auth\Action\UpdateUserAction::class,'user.update');
//        $app->get('/user/delete/:uid',\Auth\Action\DeleteUserAction::class,'user.delete');
//        $app->get('/user/import',\Auth\Action\ImportUserAction::class,'user.import');
//        $app->get('/user/export',\Auth\Action\ExportUserAction::class,'user.export');
//        $app->get('/user/list',\Auth\Action\ListUserAction::class,'user.list');

        return $app;
    }
}