<?php
namespace User\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class UserTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "user";
    protected $model = \User\Model\UserModel::class;
}
