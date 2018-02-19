<?php
namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;

class AreaHelper extends AbstractHelper
{
    public function __invoke($area,$name)
    {
        $output = '';
        if(array_key_exists($name,$area)) {
            /* @var $area['data'] array */
            foreach($area[$name] as $area){
                $params = json_decode($area['data']->getParameters(),true);
                $attrs = json_decode($area['data']->getAttributes(),true);
                $options = json_decode($area['data']->getOptions(),true);

                $output .= $this->getView()->plugin('openTag')($params,$attrs,$area['data']);

                if( array_key_exists('block',$area) && ! empty($area['block'])){
                    /* @var $block \Block\Model\BlockModel*/
                    foreach($area['block'] as $block) {
                        if(array_key_exists('data',$block)){
                            $output .= $this->getView()->plugin('displayBlock')($block);
                        }
                    }
                }
                $output .= $this->getView()->plugin('closeTag')($params,$attrs);
            }
        }

        return $output;
    }
}
