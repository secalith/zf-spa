<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block\Model;

use Zend\Json\Json as Json;

class BlockModel
{
    public $uid;
    public $area;
    public $content;
    public $form;
    public $attributes;
    public $parameters;
    public $options;
    public $type;
    public $template;
    public $order;
    public $name;
    public $parent_uid;

    /**
     * @return mixed
     */
    public function getForm($name)
    {
        return $this->form[$name];
    }
    /**
     * @return mixed
     */
    public function getForms()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     * @return BlockModel
     */
    public function setForm($form,$name)
    {
        $this->form[$name] = $form;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentUid()
    {
        return $this->parent_uid;
    }

    /**
     * @param mixed $parent_uid
     * @return BlockModel
     */
    public function setParentUid($parent_uid)
    {
        $this->parent_uid = $parent_uid;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     * @return BlockModel
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     * @return BlockModel
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return BlockModel
     */
    public function setContent($content)
    {
        $this->content = $content;
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
     * @return BlockModel
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
     * @return BlockModel
     */
    public function setOptions($options)
    {
        $this->options = $options;
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
     * @return BlockModel
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return BlockModel
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     * @return BlockModel
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return BlockModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function exchangeArray($data)
    {
        $this->uid     = (!empty($data['uid'])) ? $data['uid'] : null;
        $this->area     = (!empty($data['area'])) ? $data['area'] : null;
        $this->type = (!empty($data['type'])) ? $data['type'] : null;
        $this->template = (!empty($data['template'])) ? $data['template'] : null;
        $this->content = (!empty($data['content'])) ? $data['content'] : null;
        $this->form = (!empty($data['form'])) ? $data['form'] : null;
        $this->attributes = (!empty($data['attributes'])) ? $data['attributes'] : null;
        $this->setAttributes($this->getAttributes());
        $this->parameters = (!empty($data['parameters'])) ? $data['parameters'] : null;
        $this->setParameters($this->getParameters());
        $this->options = (!empty($data['options'])) ? $data['options'] : null;
        $this->setOptions($this->getOptions());
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->order = (!empty($data['order'])) ? $data['order'] : null;
        $this->parent_uid = (!empty($data['parent_uid'])) ? $data['parent_uid'] : null;
    }
}
