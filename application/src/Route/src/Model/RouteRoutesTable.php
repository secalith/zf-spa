<?php

namespace Route\Model;

use Common\Model\CommonTableGateway;
use Route\Entity\RouteRoutesEntity as Entity;
use Zend\Db\TableGateway\TableGateway;

class RouteRoutesTable
{
    protected $cache_namespace = "routeRoutes_model_table";

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchBy($value, $name = "uid")
    {
        $rowset = $this->tableGateway->select(array($name => $value));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $value");
        }
        return $row;
    }

    public function fetchAll()
    {
        // check if cache is present
        if (null!==$this->cache
            && null!==$this->cache->getItem($this->cache_namespace)) {
            $result = $this->cache->getItem($this->cache_namespace);
        } else {
            $resultSet = $this->tableGateway->select();
            foreach ($resultSet as $item) {
                $result[$item->getName()] = $item;
            }
            if (null!==$this->cache) {
                $this->cache->removeItem($this->cache_namespace);
                $this->cache->setItem($this->cache_namespace, $result);
            }
        }
        return $result;
    }

    public function getItem($uid)
    {
        $rowset = $this->tableGateway->select(array('uid' => $uid));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $uid");
        }
        return $row;
    }

    public function saveItem(Entity $item)
    {
        $data = array(
            'uid' => $item->getUid(),
            'parent_uid' => $item->getParentUid(),
            'name' => $item->getName(),
            'route_uid' => $item->getRouteUid(),
            'module' => $item->getModule(),
            'submodule' => $item->getSubmodule(),
            'controller' => $item->getController(),
            'action' => $item->getAction(),
            'scenario' => $item->getScenarioName(),
            'route' => $item->getRoute(),
            'options' => $item->getOptions(),
        );
        $this->tableGateway->insert($data);
    }

    public function updateItem(Entity $item)
    {
        $data = array(
            'uid' => $item->getUid(),
            'parent_uid' => $item->getParentUid(),
            'name' => $item->getName(),
            'route_uid' => $item->getRouteUid(),
            'module' => $item->getModule(),
            'submodule' => $item->getSubmodule(),
            'controller' => $item->getController(),
            'action' => $item->getAction(),
            'scenario' => $item->getScenarioName(),
            'route' => $item->getRoute(),
            'options' => $item->getOptions(),
        );

        $uid = $item->getUid();

        if (null!==$uid&&0===$uid) {
            throw new \Exception('Item\'s uid cannot be null');
        } else {
            if ($this->getItem($uid)) {
                $this->tableGateway->update($data, array('uid' => $uid));
            } else {
                throw new \Exception('Item\'s uid does not exist');
            }
        }
    }

    public function deleteItem($uid)
    {
        $this->tableGateway->delete(array('uid' => $uid));
    }
}
