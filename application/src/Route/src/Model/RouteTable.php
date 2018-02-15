<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Route\Model;

use Zend\Db\TableGateway\TableGateway;

class RouteTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
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

    public function fetchBy($value, $name = "uid")
    {
        $rowset = $this->tableGateway->select(array($name => $value));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $value");
        }
        return $row;
    }

    public function saveItem($item)
    {
        $data = array(
            'uid' => $item->getUid(),
            'route_name' => $item->getRouteName(),
        );
        $this->tableGateway->insert($data);
    }

    public function updateItem($item)
    {
        $data = array(
            'route_name' => $item->getRouteName(),
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
