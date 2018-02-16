<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Content;

trait ContentAwareTrait
{

    protected $content;

    public function setContent($content, $contentName = null)
    {
        if (null!==$contentName) {
            $this->content[$contentName] = $content;
        } else {
            $this->content = $content;
        }

        return $this;
    }
    public function getContent($contentName = null)
    {
        if (null!==$contentName) {
            if (array_key_exists($contentName, $this->content)) {
                return $this->content[$contentName];
            }
        }
        return $this->content;
    }
}
