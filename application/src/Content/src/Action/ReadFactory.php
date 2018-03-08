<?php

namespace Content\Action;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ReadFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;


        // read content by uid and fetch into edit form

        $routeName = $container->get(\Common\Helper\RouteHelper::class)->getMatchedRouteName();

        if($routeName==='content.read') {
            // obtain the real routeName from the UID
            $matchedParams = $container->get(\Common\Helper\RouteHelper::class)
                ->getRouteResult()->getMatchedParams();
            if(array_key_exists('uid',$matchedParams)) {
                $requestedRoute = $container->get("Route\\Table")->getItem($matchedParams['uid']);

                $contentResult = $container->get("Content\\Table")->getItem($matchedParams['uid']);

                var_dump($contentResult);
                die();

                // get route by page
                $routeName = $requestedRoute->getRouteName();
            }
        }

        return new ReadAction($router, $template);
    }
}
