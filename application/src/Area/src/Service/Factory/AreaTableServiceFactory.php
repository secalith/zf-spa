<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Area\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class AreaTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "area";
    protected $requestedGateway = "Area\\Gateway";
    protected $requestedTable = \Area\Model\AreaTable::class;
}
