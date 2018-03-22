<?php

namespace View\Controller\Delegator;

use Common\View\Model\ViewModel;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;
use View\Controller\PageViewAwareInterface;
use Zend\Expressive\Helper\UrlHelper;

/**
 * Class PageViewDelegatorFactory
 *
 * @package View\Controller
 */
class PageViewDelegatorFactory implements DelegatorFactoryInterface
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
        // The callback must implement
        if ( ! call_user_func($callback) instanceof PageViewAwareInterface) {
            return call_user_func($callback);
        } else {
            $routeName = $container->get(\Common\Helper\RouteHelper::class)->getMatchedRouteName();

            if($routeName==='page.edit') {
                // obtain the real routeName from the UID
                $matchedParams = $container->get(\Common\Helper\RouteHelper::class)
                    ->getRouteResult()->getMatchedParams();
                if(array_key_exists('uid',$matchedParams)) {
                    $requestedRoute = $container->get("Route\\Table")->getItem($matchedParams['uid']);
                    // get route by page
                    $routeName = $requestedRoute->getRouteName();
                }
            }

            $pageView = new \Zend\View\Model\ViewModel();
            if (false!=$container->has("Page\\Table"))
            {
                /* @var \Page\Model\PageModel $page */
                $page = $container->get("Page\\Table")
                    ->fetchBy($routeName,'name');

                if( ! empty($page)) {
                    $pageView->setVariable('page',$page);
                    /* @var \Template\Model\TemplateModel $template */
                    $template = $container->get("Template\\Table")
                        ->fetchBy($page->getTemplate());
                    if( ! empty($template)) {
                        $pageView->setVariable('template',$template);
                        $areaView = new ViewModel();

                        /* @var array $areas */
                        $areas = $container->get("Area\\Table")
                            ->fetchAllBy($template->getUid(),'template');

                        // get global areas
                        $globalAreas = $container->get("Area\\Table")
                            ->fetchAllBy('global','scope');

                        $areas = (!empty($areas)&&!empty($globalAreas))
                            ? array_merge($globalAreas,$areas)
                            : $globalAreas;

                        if( ! empty($areas)) {
                            /* @var array $areas @var \Area\Model\AreaModel $area */
                            foreach($areas as $area){

                                $areaView->setArea($area);
// get root blocks
                                $rootBlocksDB = $container->get("Block\\Table")
                                    ->fetchAllBy(['area'=>$area->getUid(),'parent_uid'=>'0']);


                                if( null !== $rootBlocksDB ) {
                                    /* @var array $rootBlocksDB @var \Block\Model\BlockModel $rootBlock */
                                    foreach ($rootBlocksDB as $rootBlock) {
                                        $areaView->getArea($area)->setBlock($rootBlock);
// get content for the root block
                                        $rootBlockContent = $container->get("Content\\Table")
                                            ->fetchAllBy(['block' => $rootBlock->getUid(), 'parent_uid'=>'0']);
                                        // set content for the Root Block
                                        if( ! empty($rootBlockContent)) {
                                            foreach($rootBlockContent as $rootBlockContentData) {
                                                $areaView->getArea($area)->getBlock($rootBlock)->setContent($rootBlockContentData);
// get content for the content
                                                $rootBlockContentChild = $container->get("Content\\Table")
                                                    ->fetchAllBy(['block' => $rootBlock->getUid(), 'parent_uid'=>$rootBlockContentData->getUid()]);
                                                if( ! empty($rootBlockContentChild)) {
                                                    foreach ($rootBlockContentChild as $rootBlockContentChildData) {
                                                        $areaView->getArea($area)->getBlock($rootBlock)->getContent($rootBlockContentData)->setContent($rootBlockContentChildData);
                                                    }
                                                }
                                            }
                                        }
//                                         check for forms attached to the Root Block
                                        $rootBlockForm = $container->get("Form\\Block\\Table")
                                            ->fetchAllBy(['block_uid' => $rootBlock->getUid()]);
                                        if(null!==$rootBlockForm) {
                                            foreach($rootBlockForm as $rootBlockFormData) {
                                                if(null!==$rootBlockFormData->getFormFqdn()) {
                                                    $formFqdn = $rootBlockFormData->getFormFqdn();
                                                    $formClass = new $formFqdn();
                                                    // get form from DB
                                                    $rootForm = $container->get("Form\\Table")
                                                        ->getItem($rootBlockFormData->getFormUid());
                                                    $formAttributes = json_decode($rootForm->getAttributes());
//                                                    var_dump($rootForm->getAttributes());
                                                    if(!empty($formAttributes)) {
                                                        $action = $formAttributes->action;
                                                        $helper = $this->get_string_between($action,'[::',':');
                                                        if( ! $helper) {

                                                            $formClass->setAttribute('action',$action);
                                                        } else {
                                                            $routeNameForm = $this->get_string_between($action,$helper.':','::]');

                                                            $t = $container->get(UrlHelper::class);

                                                            $formClass->setAttribute('action',$t->generate($routeNameForm));
                                                        }

                                                    }
                                                    $areaView->getArea($area)->getBlock($rootBlock)->setForm($formClass,$formClass->getName());
                                                }
                                            }
                                        }

// check for blocks (inside the Block)
                                        $childBlocksDB = $container->get("Block\\Table")
                                            ->fetchAllBy(['area'=>$area->getUid(),'parent_uid'=>$rootBlock->getUid()]);
                                        // get the child block for the Root Block
                                        if( ! empty($childBlocksDB)) {
                                            foreach($childBlocksDB as $childBlock){
                                                $areaView->getArea($area)->getBlock($rootBlock)->setBlock($childBlock);
// get content for childBlock
                                                $childBlockContent = $container->get("Content\\Table")
                                                    ->fetchAllBy(['block' => $childBlock->getUid(), 'parent_uid'=>'0']);
                                                if( ! empty($childBlockContent)) {
                                                    foreach($childBlockContent as $childBlockContentItem){
                                                        $areaView->getArea($area)->getBlock($rootBlock)->getBlock($childBlock)->setContent($childBlockContentItem);
//get (child) content for content
                                                        $childBlockContentChildContent = $container->get("Content\\Table")
                                                            ->fetchAllBy(['block' => $childBlock->getUid(), 'parent_uid'=>$childBlockContentItem->getUid()]);
                                                        if( null !== $childBlockContentChildContent) {
                                                            foreach($childBlockContentChildContent as $childBlockContentChildItem){
                                                                $areaView->getArea($area)->getBlock($rootBlock)->getBlock($childBlock)->getContent($childBlockContentItem)->setContent($childBlockContentChildItem);
// check for content-content content
                                                                $childBlockContentChildContentChild = $container->get("Content\\Table")
                                                                    ->fetchAllBy(['block' => $childBlock->getUid(), 'parent_uid'=>$childBlockContentChildItem->getUid()]);

                                                                if( ! empty($childBlockContentChildContentChild)) {
                                                                    foreach($childBlockContentChildContentChild as $childBlockContentChildContentChildContent) {
                                                                        $areaView->getArea($area)->getBlock($rootBlock)->getBlock($childBlock)->getContent($childBlockContentItem)->getContent($childBlockContentChildItem)->setContent($childBlockContentChildContentChildContent);
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            $pageView->setVariable('area',$areaView);

                            $view = new \Zend\View\Model\ViewModel();

                            // this is not needed since it matches "module/controller/action"
                            $view->setTemplate('app::test');

                            $pageView->addChild($view,'test');
                        }
                    }

                }
            }

            $callback = call_user_func($callback)->setPageView($pageView);
        }

        if ($callback instanceof PageViewAwareInterface) {
            return $callback;
        }

        return call_user_func($callback);
    }

    public function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {}
}
