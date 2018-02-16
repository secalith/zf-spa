<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block;

trait BlockAwareTrait
{

    protected $block;

    public function setBlock($block, $blockName = null)
    {
        if (null!==$blockName) {
            $this->block[$blockName] = $block;
        } else {
            $this->block[] = $block;
        }

        return $this;
    }
    public function getBlock($blockName = null)
    {
        if (null!==$blockName) {
            if (array_key_exists($blockName, $this->block)) {
                return $this->block[$blockName];
            }
        }
        return $this->block;
    }
}
