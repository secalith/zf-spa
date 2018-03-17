<?php
namespace Auth\Service\Factory;

use Common\Service\Factory\CommonTableGatewayFactory;

class UserTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "user";
    protected $model = \Auth\Model\UserModel::class;
}
