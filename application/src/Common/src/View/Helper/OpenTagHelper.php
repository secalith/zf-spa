<?php
namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;

class OpenTagHelper extends AbstractHelper
{
    public function __invoke($parameters, $attributes)
    {
        $output = '';
        if( ! empty($parameters) && array_key_exists('html_tag',$parameters)) {
            $output = sprintf('<%s',$parameters['html_tag']);
            if( ! empty($attributes)) {
                foreach($attributes as $attrName=>$attrValue) {
                    if(is_string($attrValue)){
                        $attrCombined = $attrValue;
                    } elseif(is_array($attrValue)) {
                        $attrCombined = '';
                        foreach($attrValue as $partialValue){
                            $attrCombined = sprintf(" %s",$partialValue);
                        }

                    }
                    $output .= sprintf(' %s="%s"',$attrName,trim($attrCombined));
                }
            }
            if(in_array($parameters['html_tag'],['img'])) {
                $output .= '/';
            }
            $output .= '>';

        }

        return $output;
    }
}
