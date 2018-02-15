<?php

namespace App\Action;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Db\Adapter\AdapterInterface;

class HomePageFactory
{
    public function __invoke(ContainerInterface $container)
    {

        if (null!=$container->get("Route\\Table")) {
            $items = $container->get("Route\\Table")
                ->fetchAll();

            foreach($items as $item){
                var_dump($item);
            }
//            var_dump($items);

        } else {
            echo 'The Configuration not set;';
        }

        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        return new HomePageAction($router, $template);
    }
}
