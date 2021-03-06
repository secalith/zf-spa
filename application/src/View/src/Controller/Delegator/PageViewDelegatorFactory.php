<?php

namespace View\Controller\Delegator;

use Common\View\Model\ViewModel;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;
use View\Controller\PageViewAwareInterface;

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
            $pageView = new \Zend\View\Model\ViewModel();
            if (false!=$container->has("Page\\Table"))
            {
                $areaView = new ViewModel();
                /* @var \Page\Model\PageModel $page */
                $page = $container->get("Page\\Table")
                    ->fetchBy($routeName,'name');
                $pageView->setVariable('page',$page);
                /* @var \Template\Model\TemplateModel $template */
                $template = $container->get("Template\\Table")
                    ->fetchBy($page->getTemplate());
                $pageView->setVariable('template',$template);
                /* @var array $areas */
                $areas = $container->get("Area\\Table")
                    ->fetchAllBy($template->getUid(),'template');
                /* @var array $areas @var \Area\Model\AreaModel $area */
                foreach($areas as $area){
                    $areaViewd = new \Zend\View\Model\ViewModel();
                    $areaViewd->setVariable('data',new ViewModel($area));
                    $areaViewd->setTemplate('app/test');

                    $areaView->setArea($area);
// get root blocks
                    $rootBlocksDB = $container->get("Block\\Table")
                        ->fetchAllBy(['area'=>$area->getUid(),'template'=>$template->getUid(),'parent_uid'=>'0']);
                    if( null !== $rootBlocksDB ) {
                        /* @var array $rootBlocksDB @var \Block\Model\BlockModel $rootBlock */
                        foreach ($rootBlocksDB as $rootBlock) {
                            $areaView->getArea($area)->setBlock($rootBlock);
                            $rootViewd = new \Zend\View\Model\ViewModel();
                            $rootViewd->setVariable('block',new ViewModel($rootBlock));
                            $rootViewd->setTemplate('app::test');
                            $areaViewd->addChild($rootViewd,'block');
// get content for the root block
                            $rootBlockContent = $container->get("Content\\Table")
                                ->fetchAllBy(['block' => $rootBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>'0']);
                            if( ! empty($rootBlockContent)) {
                                foreach($rootBlockContent as $rootBlockContentData) {
                                    $areaView->getArea($area)->getBlock($rootBlock)->setContent($rootBlockContentData);
// get content for the content
                                    $rootBlockContentChild = $container->get("Content\\Table")
                                        ->fetchAllBy(['block' => $rootBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$rootBlockContentData->getUid()]);
                                    if( ! empty($rootBlockContentChild)) {
                                        foreach ($rootBlockContentChild as $rootBlockContentChildData) {
                                            $areaView->getArea($area)->getBlock($rootBlock)->getContent($rootBlockContentData)->setContent($rootBlockContentChildData);
                                        }
                                    }
                                }
                            }
// check for blocks (inside the Block)
                            $childBlocksDB = $container->get("Block\\Table")
                                ->fetchAllBy(['area'=>$area->getUid(),'template'=>$template->getUid(),'parent_uid'=>$rootBlock->getUid()]);
                            if( ! empty($childBlocksDB)) {
                                foreach($childBlocksDB as $childBlock){
                                    $areaView->getArea($area)->getBlock($rootBlock)->setBlock($childBlock);
// get content for childBlock
                                    $childBlockContent = $container->get("Content\\Table")
                                        ->fetchAllBy(['block' => $childBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>'0']);
                                    if( ! empty($childBlockContent)) {
                                        foreach($childBlockContent as $childBlockContentItem){
                                            $areaView->getArea($area)->getBlock($rootBlock)->getBlock($childBlock)->setContent($childBlockContentItem);
//get (child) content for content
                                            $childBlockContentChildContent = $container->get("Content\\Table")
                                                ->fetchAllBy(['block' => $childBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$childBlockContentItem->getUid()]);
                                            if( null !== $childBlockContentChildContent) {
                                                foreach($childBlockContentChildContent as $childBlockContentChildItem){
                                                    $areaView->getArea($area)->getBlock($rootBlock)->getBlock($childBlock)->getContent($childBlockContentItem)->setContent($childBlockContentChildItem);
// check for content-content content
                                                    $childBlockContentChildContentChild = $container->get("Content\\Table")
                                                        ->fetchAllBy(['block' => $childBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$childBlockContentChildItem->getUid()]);

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

            $callback = call_user_func($callback)->setPageView($pageView);
        }

        if ($callback instanceof PageViewAwareInterface) {
            return $callback;
        }

        return call_user_func($callback);
    }

    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {}
}
