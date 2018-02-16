<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block;

interface BlockAwareInterface
{

    public function setBlock($block, $blockName = null);
    public function getBlock($blockName = null);
}
