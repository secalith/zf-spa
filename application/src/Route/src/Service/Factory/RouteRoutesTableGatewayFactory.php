<?php
namespace Route\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class RouteRoutesTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "route_routes";
    protected $model = \Route\Model\RouteRoutesModel::class;
}
