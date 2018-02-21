<?php

namespace App\Action;

use \Common\View\Model\ViewModel as CommonViewModel;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Db\Adapter\AdapterInterface;

class HomePageFactory
{
    public function __invoke(ContainerInterface $container)
    {

        $routeName = $container->get(\Common\Helper\RouteHelper::class)->getMatchedRouteName();

        $pageView = [];

        if (null!=$container->has("Page\\Table"))
        {
            $areaView = new CommonViewModel();

            /* @var \Page\Model\PageModel $page */
            $page = $container->get("Page\\Table")
                ->fetchBy($routeName,'name');
            $pageView['page'] = $page;
            /* @var \Template\Model\TemplateModel $template */
            $template = $container->get("Template\\Table")
                ->fetchBy($page->getTemplate());
            $pageView['template'] = $template;
            /* @var array $areas */
            $areas = $container->get("Area\\Table")
                ->fetchAllBy($template->getUid(),'template');
            /* @var array $areas @var \Area\Model\AreaModel $area */
            foreach($areas as $area){
                $areaView->setArea($area);
// get root blocks
                $rootBlocksDB = $container->get("Block\\Table")
                    ->fetchAllBy(['area'=>$area->getUid(),'template'=>$template->getUid(),'parent_uid'=>'0']);
                if( null !== $rootBlocksDB ) {
                    $blocksForView = [];
                    /* @var array $rootBlocksDB @var \Block\Model\BlockModel $rootBlock */
                    foreach ($rootBlocksDB as $rootBlock) {
                        $areaView->getArea($area)->setBlock($rootBlock);
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

            $pageView['area'] = $areaView;
        }

        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $req = new HomePageAction($router, $template);

        return $req->setPageView($pageView);
    }
}
