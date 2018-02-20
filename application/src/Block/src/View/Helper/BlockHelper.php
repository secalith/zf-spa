<?php
namespace Block\View\Helper;

use Zend\View\Helper\AbstractHelper;

class BlockHelper extends AbstractHelper
{
    public function __invoke($item)
    {

        $output = $this->getView()->plugin('openTag')($item);

        if( ! empty($item->getBlock())){
            /* @var $block \Block\Model\BlockModel*/
            foreach($item->getBlock() as $block) {
                $output .= $this->getView()->plugin('displayBlock')($block);
            }
        }

        if( ! empty($item->getContent())){
            /* @var $block \Block\Model\BlockModel*/
            foreach($item->getContent() as $content) {
                $output .= $this->getView()->plugin('displayContent')($content);
            }
        }

        $output .= $this->getView()->plugin('closeTag')($item);

        return $output;
    }
}
