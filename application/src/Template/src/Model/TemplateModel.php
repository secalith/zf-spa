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
