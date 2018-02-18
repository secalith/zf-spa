<?php
namespace Block\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class BlockTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "block";
    protected $model = \Block\Model\BlockModel::class;
}
