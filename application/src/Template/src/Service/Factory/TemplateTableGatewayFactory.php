<?php
namespace Template\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class TemplateTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "template";
    protected $model = \Template\Model\TemplateModel::class;
}
