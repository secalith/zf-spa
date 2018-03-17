<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Auth\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class UserTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "user";
    protected $requestedGateway = "User\\Gateway";
    protected $requestedTable = \Auth\Model\UserTable::class;
}
