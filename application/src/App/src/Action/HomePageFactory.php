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

        $routeName = $container->get(\Common\Helper\RouteHelper::class)->getMatchedRouteName();

        if (null!=$container->has("Page\\Table"))
        {

            $pageView = [];
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
                $pageView['area'][$area->getMachineName()][$area->getUid()]['data'] = $area;
                $currentAreaBlocks = [];
// get root blocks
                $rootBlocksDB = $container->get("Block\\Table")
                    ->fetchAllBy(['area'=>$area->getUid(),'template'=>$template->getUid(),'parent_uid'=>'0']);
                if( null !== $rootBlocksDB ) {
                    $blocksForView = [];
                    /* @var array $rootBlocksDB @var \Block\Model\BlockModel $rootBlock */
                    foreach ($rootBlocksDB as $rootBlock) {
                        $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$rootBlock->getUid()]['data'] = $rootBlock;
// get content for the root block
                        $rootBlockContent = $container->get("Content\\Table")
                            ->fetchAllBy(['block' => $rootBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>'0']);
                        if( ! empty($rootBlockContent)) {
                            foreach($rootBlockContent as $rootBlockContentData) {
                                $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$rootBlock->getUid()]['content'][$rootBlockContentData->getUid()]['data']=$rootBlockContentData;
// get content for the content
                                $rootBlockContentChild = $container->get("Content\\Table")
                                    ->fetchAllBy(['block' => $rootBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$rootBlockContentData->getUid()]);
                                if( ! empty($rootBlockContentChild)) {
                                    foreach ($rootBlockContentChild as $rootBlockContentChildData) {
                                        $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$rootBlock->getUid()]['content'][$rootBlockContentData->getUid()]['content'][$rootBlockContentChildData->getUid()]['data'] = $rootBlockContentChildData;
                                    }
                                }
                            }
                        }
// check for blocks (inside the Block)
                        $childBlocksDB = $container->get("Block\\Table")
                            ->fetchAllBy(['area'=>$area->getUid(),'template'=>$template->getUid(),'parent_uid'=>$rootBlock->getUid()]);
                        if( ! empty($childBlocksDB)) {
                            foreach($childBlocksDB as $childBlock){
                                $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$rootBlock->getUid()]['block'][$childBlock->getUid()]['data']=$childBlock;
// get content for childBlock
                                $childBlockContent = $container->get("Content\\Table")
                                    ->fetchAllBy(['block' => $childBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>'0']);
                                if( ! empty($childBlockContent)) {
                                    foreach($childBlockContent as $childBlockContentItem){
                                        $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$rootBlock->getUid()]['block'][$childBlock->getUid()]['content'][$childBlockContentItem->getUid()]['data']=$childBlockContentItem;
//get (child) content for content
                                        $childBlockContentChildContent = $container->get("Content\\Table")
                                            ->fetchAllBy(['block' => $childBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$childBlockContentItem->getUid()]);
                                        if( null !== $childBlockContentChildContent) {
                                            foreach($childBlockContentChildContent as $childBlockContentChildItem){
                                                $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$rootBlock->getUid()]['block'][$childBlock->getUid()]['content'][$childBlockContentItem->getUid()]['content'][$childBlockContentChildItem->getUid()]['data']=$childBlockContentChildItem;
// check for content-content content
                                                $childBlockContentChildContentChild = $container->get("Content\\Table")
                                                    ->fetchAllBy(['block' => $childBlock->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$childBlockContentChildItem->getUid()]);

                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }



                if(1==2) {
                    /* @var array $blocks @var \Block\Model\BlockModel $block */
                    foreach ($blocks as $block) {
                        $blocksForView[$block->getUid()]['data'] = $block;
                        // get children block per each root block
                        $blocksChildren = $container->get("Block\\Table")
                            ->fetchAllBy(['area'=>$area->getUid(),'template'=>$template->getUid(),'parent_uid'=>$block->getUid()]);
                        if( ! empty($blocksChildren)){
                            foreach($blocksChildren as $blockChildUid => $blockChild){
                                $blocksForView[$block->getUid()]['block'][$blockChild->getUid()]['data'] = $blockChild;
                                $blockContent = $container->get("Content\\Table")
                                    ->fetchAllBy(['block' => $blockChild->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>'0']);
//                                var_dump($blockContent);
                                if(null!==$blockContent) {
                                    foreach($blockContent as $blockContentData){
                                        $blocksForView[$block->getUid()]['block'][$blockChild->getUid()]['content'][$blockContentData->getUid()]['data'] = $blockContentData;
                                        $blocksForView[$block->getUid()]['block'][$blockChild->getUid()]['content'][$blockContentData->getUid()]['content'] = $blockContentData;
//var_dump(get_class($blockContentData));
//$pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['children'][$blockChildUid]['data'][$blockContentData->getUid()]=$blockContentData;
//$pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['children'][$blockChildUid]['content'][$blockContentData->getUid()]=$blockContentData;
//var_dump($blockContentData);echo '<hr />';


                                        $blockContentChildren = $container->get("Content\\Table")
                                            ->fetchAllBy(['block' => $blockChild->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$blockContentData->getUid()]);
//var_dump($contentChildren);
                                        if(null!==$blockContentChildren){
                                            $blocksForView[$block->getUid()]['block'][$blockChild->getUid()]['content'][$blockContentData->getUid()]['children'] = $blockContentData;

//                                            var_dump($blockContentChildren);echo '<hr />';
//                                            $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['children']['block'][$blockContentData->getUid()]['content']=$blockContentChildren;
                                        }

//
//                                        $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['content'][$blockContentData->getUid()]['data']=$blockContentData;
                                    }
                                }
                            }
                        }
                        $pageView['area'][$area->getMachineName()][$area->getUid()]['block'] = $blocksForView;
//                        $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['children'] = $blocksChildren;

//                        $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['data'] = $block;

                        $content = $container->get("Content\\Table")
                            ->fetchAllBy(['block' => $block->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>'0']);
                        //echo count($content) . ' :: ' . $block->getUid().'<hr />';
                        if(null!==$content) {
                            /* @var array $content @var \Content\Model\ContentModel $contentData */
                            foreach($content as $contentData){
                                $contentChildren = $container->get("Content\\Table")
                                    ->fetchAllBy(['block' => $block->getUid(), 'template' => $page->getTemplate(), 'parent_uid'=>$contentData->getUid()]);
                                $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['content'][$contentData->getUid()]['children']=$contentChildren;

                                $pageView['area'][$area->getMachineName()][$area->getUid()]['block'][$block->getUid()]['content'][$contentData->getUid()]['data']=$contentData;
                            }
                        }
                    }
                }




            }

        } else {
//            var_dump('sad');
//            echo 'The Routes not set;';
        }

//        var_dump($pageView);


        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $req = new HomePageAction($router, $template);

        return $req->setPageView($pageView);
    }
}
