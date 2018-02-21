<?php

namespace Common\Hydrator;

use Zend\Hydrator\Strategy\StrategyInterface;
use Zend\Json\Json;

class JsonHydrator implements StrategyInterface
{
    public function extract($value)
    {
        return Json::decode($value,Json::TYPE_ARRAY);
    }

    public function hydrate($value)
    {var_dumP($value);die();
        return Json::encode($value);
    }
}