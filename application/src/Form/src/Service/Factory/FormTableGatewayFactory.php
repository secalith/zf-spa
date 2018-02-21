<?php
namespace Form\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class FormTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "form";
    protected $model = \Form\Model\FormModel::class;
}
