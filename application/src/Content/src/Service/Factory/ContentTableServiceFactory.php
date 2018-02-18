<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Content\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class ContentTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "content";
    protected $requestedGateway = "Content\\Gateway";
    protected $requestedTable = \Content\Model\ContentTable::class;
}
