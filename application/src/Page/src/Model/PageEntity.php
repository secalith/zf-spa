<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Page\Model;

class PageEntity
{
    /**
     * @var string
     */
    protected $uid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string
     */
    protected $route_url;

    /**
     * @var string
     */
    protected $page_cache;

    /**
     * @var array
     */
    protected $constraints;

    /**
     * @param string $name
     * @return UserEntity
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $name
     * @return UserEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $template
     * @return UserEntity
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return UserEntity
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $template
     * @return UserEntity
     */
    public function setRouteUrl($route_url)
    {
        $this->route_url = $route_url;
        return $this;
    }

    /**
     * @return string
     */
    public function getRouteUrl()
    {
        return $this->route_url;
    }

    /**
     * @param integer $page_cache
     * @return UserEntity
     */
    public function setPageCache($page_cache)
    {
        $this->page_cache = $page_cache;
        return $this;
    }

    /**
     * @return integer
     */
    public function getPageCache()
    {
        return $this->page_cache;
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
     * @return UserEntity
     */
    public function setConstraints($constraints)
    {
        $this->constraints = $constraints;
        return $this;
    }
}
