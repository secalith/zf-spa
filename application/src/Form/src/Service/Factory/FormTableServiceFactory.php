<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Form\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class FormTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "content";
    protected $requestedGateway = "Form\\Gateway";
    protected $requestedTable = \Form\Model\FormTable::class;
}
