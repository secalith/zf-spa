<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Template\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class TemplateTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "template";
    protected $requestedGateway = "Template\\Gateway";
    protected $requestedTable = \Template\Model\TemplateTable::class;
}
