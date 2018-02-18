<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class BlockTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "block";
    protected $requestedGateway = "Block\\Gateway";
    protected $requestedTable = \Block\Model\BlockTable::class;
}
