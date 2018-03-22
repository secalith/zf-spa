<?php
namespace Form\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class FormBlockTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "block_form";
    protected $model = \Form\Model\FormBlockModel::class;
}
