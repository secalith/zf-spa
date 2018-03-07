<?php

namespace Common\Common;

interface ConfigurationAwareInterface
{
    public function setAttribute($name,$value);
    public function setAttributes($attributes);
    public function getAttribute($name);
    public function getAttributes();
    public function setOption($name,$value);
    public function setOptions($options);
    public function getOption($name);
    public function getOptions();
    public function setParameter($name,$value);
    public function setParameters($parameters);
    public function getParameter($name);
    public function getParameters();
}
