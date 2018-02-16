<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Page\Model;

class PageModel
{
    public $uid;
    public $name;
    public $template;
    public $route;
    public $page_cache;
    public $submodule;
    public $constraints;

    public function getSubmodule()
    {
        return $this->submodule;
    }

    public function setSubmodule($submodule)
    {
        $this->submodule = $submodule;
        return $this;
    }


    public function getName()
    {
        return $this->name;
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
     * @return PageModel
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
     * @return PageModel
     */
    public function setTemplate($template)
    {
        $this->template = $template;
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
     * @return PageModel
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageCache()
    {
        return $this->page_cache;
    }

    /**
     * @param mixed $route
     * @return PageModel
     */
    public function setPageCache($page_cache)
    {
        $this->page_cache = $page_cache;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConstraints()
    {
        return $this->constraints;
    }

    /**
     * @param mixed $constraints
     * @return PageModel
     */
    public function setConstraints($constraints)
    {
        $this->constraints = $constraints;
        return $this;
    }

    public function exchangeArray($data)
    {
        $this->uid     = (!empty($data['uid'])) ? $data['uid'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->template = (!empty($data['template'])) ? $data['template'] : null;
        $this->route = (!empty($data['route'])) ? $data['route'] : null;
        $this->page_cache = (!empty($data['page_cache'])) ? $data['page_cache']:null;
        $this->submodule = (!empty($data['submodule'])) ? $data['submodule']:null;
        $this->constraints = (!empty($data['constraints'])) ? $data['constraints']:null;
    }
}
