<?php
namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;

class OpenTagHelper extends AbstractHelper
{
    protected $tagsNotAllowed = [
        'img','hr','br'
    ];

    protected $tagsNotAllowedSpecial = [
        'i'
    ];

    public function __invoke($item)
    {
        $output = '';
        $parameters = json_decode($item->getData()->getParameters(),true);
        $attributes = json_decode($item->getData()->getAttributes(),true);
        $options = json_decode($item->getData()->getOptions(),true);

        $attributes['data-type'] = $item->getType();

        if(array_key_exists('wrapper',$options)) {
            if(array_key_exists('outer',$options['wrapper'])) {
                $param = (array_key_exists('parameters',$options['wrapper']['outer']))
                    ?$options['wrapper']['outer']['parameters']
                    :[]
                ;
                $attr = (array_key_exists('attributes',$options['wrapper']['outer']))
                    ?$options['wrapper']['outer']['attributes']
                    :[]
                ;

                $output .= sprintf('<%s',$param['html_tag']);

                if( ! empty($attr)) {
                    foreach($attr as $attrName=>$attrValue) {
                        if(is_string($attrValue)){
                            $attrCombined = $attrValue;
                        } elseif(is_array($attrValue)) {
                            $attrCombined = '';
                            foreach($attrValue as $partialValue){
                                $attrCombined .= sprintf(" %s",$partialValue);
                            }

                        }

                        $output .= sprintf(' %s="%s"',$attrName,trim($attrCombined));
                    }
                }

                $output .= sprintf(' %s="%s"','data-wrapper','outer');

                if(in_array($param['html_tag'],$this->tagsNotAllowed)) {
                    $output .= ' /';
                }
                $output .= '>';
            }
        }

        if( ! empty($parameters) && array_key_exists('html_tag',$parameters)) {
            $output .= sprintf('<%s',$parameters['html_tag']);
            if( ! empty($attributes)) {
                foreach($attributes as $attrName=>$attrValue) {
                    $attrCombined = '';
                    if(is_string($attrValue)){
                        $attrCombined = $attrValue;
                    } elseif(is_array($attrValue)) {
                        foreach($attrValue as $partialValue){
                            $attrCombined .= sprintf(" %s",$partialValue);
                        }

                    }
                    $output .= sprintf(' %s="%s"',$attrName,trim($attrCombined));
                }
            }
            $output .= sprintf(' %s="%s"','data-wrapper','main');
            if(in_array($parameters['html_tag'],$this->tagsNotAllowed)) {
                $output .= ' /';
            } elseif(in_array($parameters['html_tag'],$this->tagsNotAllowedSpecial)){
                $output .= sprintf("></%s>",$parameters['html_tag']);
            } else {
                $output .= '>';
            }

        }

        if(array_key_exists('wrapper',$options)) {
            if(array_key_exists('inner',$options['wrapper'])) {
                $param = (array_key_exists('parameters',$options['wrapper']['inner']))
                    ?$options['wrapper']['inner']['parameters']
                    :[]
                ;
                $attr = (array_key_exists('attributes',$options['wrapper']['inner']))
                    ?$options['wrapper']['inner']['attributes']
                    :[]
                ;

                $output .= sprintf('<%s',$param['html_tag']);
                if( ! empty($attr)) {
                    foreach($attr as $attrName=>$attrValue) {
                        if(is_string($attrValue)){
                            $attrCombined = $attrValue;
                        } elseif(is_array($attrValue)) {
                            $attrCombined = '';
                            foreach($attrValue as $partialValue){
                                $attrCombined .= sprintf(" %s",$partialValue);
                            }

                        }
                        $output .= sprintf(' %s="%s"',$attrName,trim($attrCombined));
                    }
                }
                $output .= sprintf(' %s="%s"','data-wrapper','inner');
                if( in_array($param['html_tag'],$this->tagsNotAllowed)) {
                    $output .= '/';
                }
                $output .= '>';
            }
        }

        return $output;
    }
}
