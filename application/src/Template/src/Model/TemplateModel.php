<?php
namespace Template\Model;

class TemplateModel
{
    public $uid;
    public $name;
    public $type;
    public $route;
    public $location;
    public $label;

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     * @return TemplateModel
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return TemplateModel
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     * @return TemplateModel
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function exchangeArray($data)
    {
        $this->uid     = (!empty($data['uid'])) ? $data['uid'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->type = (!empty($data['type'])) ? $data['type'] : null;
        $this->route = (!empty($data['route'])) ? $data['route'] : null;
        $this->location = (!empty($data['location'])) ? $data['location'] : null;
        $this->label = (!empty($data['label'])) ? $data['label'] : null;
    }
}
