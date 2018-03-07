<?php

namespace Common\Common;

trait ConfigurationAwareTrait
{
    public $attributes;
    public $options;
    public $parameters;

    public function setAttribute($name,$value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function getAttribute($name)
    {
        return $this->attributes[$name];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setOption($name,$value)
    {
        $this->options[$name] = $value;
        return $this;
    }

    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    public function getOption($name)
    {
        return $this->options[$name];
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setParameter($name,$value)
    {
        $this->parameters[$name] = $value;
        return $this;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function getParameter($name)
    {
        return $this->parameters[$name];
    }

    public function getParameters()
    {
        return $this->parameters;
    }

}
