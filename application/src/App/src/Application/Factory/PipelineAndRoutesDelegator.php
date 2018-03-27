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
                    $app->post($item->getRoute(), \Auth\Action\LoginProcessAction::class, $item->getName());
                    break;
                case '\Auth\Action\LogoutAction':
                    $app->get($item->getRoute(), \Auth\Action\LogoutAction::class, $item->getName());
                    break;
                case '\User\Action\ReadAction':
                    $app->get($item->getRoute(), \User\Action\ReadAction::class, $item->getName());
                    break;
                case '\User\Action\UpdateAction':
                    $app->get($item->getRoute(), \User\Action\UpdateAction::class, $item->getName());
                    break;
                case '\User\Action\DeleteAction':
                    $app->get($item->getRoute(), \User\Action\DeleteAction::class, $item->getName());
                    break;
                case '\User\Action\ListAction':
                    $app->get($item->getRoute(), \User\Action\ListAction::class, $item->getName());
                    break;
                default:
                case '\Page\Action\PageAction':
                    $app->get($item->getRoute(), \Page\Action\PageAction::class, $item->getName());
                    break;

            }
//            $app->get($item->getRoute(), $container->get($c.'Factory'), $item->getName());
        }

        // content actions
        $app->get('/page/list',\Page\Action\PageAction::class,'page.list');
//        $app->get('/user/list',\User\Action\ListAction::class,'user.list');
        $app->get('/user/account',\Page\Action\PageAction::class,'user.account');
        $app->get('/edit/page/:uid',\Page\Action\EditPageAction::class,'page.edit');
        $app->get('/read/content/:uid/:format',\Content\Action\ReadAction::class,'content.read');
        $app->get('/write/content/:uid',\Content\Action\WriteAction::class,'content.write');
//        $app->get('/write/content/:uid',\Content\Action\WriteAction::class,'page.list');

        // user actions
        $app->get('/user/create',\User\Action\CreateAction::class,'user.create');
        $app->post('/user/create/process',\User\Action\CreateProcessAction::class,'user.create.process');
//        $app->get('/user/read/:uid',\User\Action\ReadAction::class,'user.read');
//        $app->get('/user/edit/:uid',\User\Action\UpdateAction::class,'user.update');
//        $app->get('/user/delete/:uid',\User\Action\DeleteAction::class,'user.delete');
//        $app->get('/user/import',\Auth\Action\ImportUserAction::class,'user.import');
//        $app->get('/user/export',\Auth\Action\ExportUserAction::class,'user.export');
//        $app->get('/user/list',\Auth\Action\ListUserAction::class,'user.list');

        $app->get('/messenger/chat/status',\Messenger\Action\ChatStatusAction::class,'messenger.chat.status');
        $app->post('/messenger/chat/create',\User\Action\CreateAction::class,'messenger.chat.create');
        $app->get('/messenger/chat/read',\User\Action\CreateAction::class,'messenger.chat.read');


        return $app;
    }
}