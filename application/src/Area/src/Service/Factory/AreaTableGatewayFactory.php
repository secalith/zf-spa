<?php
namespace Area\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class AreaTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "area";
    protected $model = \Area\Model\AreaModel::class;
}
