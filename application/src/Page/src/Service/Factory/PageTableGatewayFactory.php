<?php
namespace Page\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class PageTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "page";
    protected $model = \Page\Model\PageModel::class;
}
