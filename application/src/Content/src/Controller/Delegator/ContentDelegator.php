<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Content\Controller\Delegator;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContentDelegator implements DelegatorFactoryInterface
{

    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        return $this->createDelegatorWithName($container, $name, $name, $callback);
    }

    public function createDelegatorWithName(
        ServiceLocatorInterface $serviceLocator,
        $name,
        $requestedName,
        $callback
    ) {
        $targetInstance = $callback();
        $parentLocator = $serviceLocator;

        if (null!==$targetInstance->getBlock()) {
            $items=null;
            foreach ($targetInstance->getBlock() as $block) {
                if ("api"===$block->getType()) {
                    // read api configuration
                    $apiBlockConfig = $block->getOption('api')['query'];
                    // get data from API

                    $config = $parentLocator->get('config');

                    $routeNs = $parentLocator->get("Route\\Service")->getRouteNameReFormatted("/", "_");
                    if (isset($config['application']['route'][$routeNs]['params']['route_params'])) {
                        // parse some route tokens from Route to API Url
                        foreach ($config['application']['route'][$routeNs]['params']['route_params'] as $param) {
                            $apiBlockConfig = str_replace(":".$param."/", $parentLocator->get("Route\\Service")->getParam($param), $apiBlockConfig);
                        }
                    }

                    $apiResponse = $parentLocator->get('spaAPIService')
                        ->setHost("http://api.ecancerdev.net")
                        ->setHost($config['application']['route'][$routeNs]['params']['url'])
                        ->setHeaders(
                            array(
                                'Accept'=>'application/json',
                                'Content-Type'=>'application/json'
                            )
                        )
                        ->setQuery($apiBlockConfig)
                        ->getRouteDataFromAPI();

                    $contentResult = $parentLocator->get(
                        "Content\\Table"
                    )->fetchAllBy(
                        $block->getUid(),
                        'block'
                    );
                    $c = null;
                    foreach ($contentResult as $content) {
                        if (isset($apiResponse['_embedded'])) {
                            $targetInstance->setContent($content->setContent($apiResponse['_embedded']));
                        } else {
                            $apiIndex = $block->getOption('index');
                            $targetInstance->setContent($content->setContent($apiResponse[$apiIndex]));
                        }

                        $c[] = $content;
                    }
                    $block->setContent($c);
                } else {
                    $contentResult = $parentLocator->get(
                        "Content\\Table"
                    )->fetchAllBy(
                        $block->getUid(),
                        'block'
                    );
                    $targetInstance->setContent($contentResult);
                    $block->setContent($contentResult);
                }
            }
        }
        return $targetInstance;
    }
}
