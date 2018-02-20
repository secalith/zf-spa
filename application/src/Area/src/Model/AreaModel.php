<?php
namespace Area\Model;

class AreaModel
{
    public $uid;
    public $template;
    public $machine_name;
    public $attributes;
    public $parameters;
    public $options;
    public $scope;

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     * @return AreaModel
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return AreaModel
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMachineName()
    {
        return $this->machine_name;
    }

    /**
     * @param mixed $machine_name
     * @return AreaModel
     */
    public function setMachineName($machine_name)
    {
        $this->machine_name = $machine_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     * @return AreaModel
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param mixed $parameters
     * @return AreaModel
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     * @return AreaModel
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param mixed $scope
     * @return AreaModel
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
        return $this;
    }


}
