<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Page\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class PageTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "page";
    protected $requestedGateway = "Page\\Gateway";
    protected $requestedTable = \Page\Model\PageTable::class;
}
