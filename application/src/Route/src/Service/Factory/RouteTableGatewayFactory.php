<?php
namespace Route\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class RouteTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "route";
    protected $model = \Route\Model\RouteModel::class;
}
