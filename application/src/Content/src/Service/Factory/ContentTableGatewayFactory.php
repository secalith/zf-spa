<?php
namespace Content\Service\Factory;


use Common\Service\Factory\CommonTableGatewayFactory;

class ContentTableGatewayFactory extends CommonTableGatewayFactory
{
    protected $identifier = "content";
    protected $model = \Content\Model\ContentModel::class;
}
