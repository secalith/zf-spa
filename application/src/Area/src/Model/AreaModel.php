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
     * @return NavigationModel
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
     * @return NavigationModel
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
     * @return NavigationModel
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
        return json_decode($this->attributes,true);
    }

    /**
     * @param mixed $attributes
     * @return NavigationModel
     */
    public function setAttributes($attributes)
    {
        if(is_array($attributes)) {
            $this->attributes = json_encode($this->attributes);
        } else {
            $this->attributes = $attributes;
        }
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
     * @return NavigationModel
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
     * @return NavigationModel
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
     * @return NavigationModel
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
        return $this;
    }


}
