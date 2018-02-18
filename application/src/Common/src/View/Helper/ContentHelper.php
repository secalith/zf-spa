<?php
namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ContentHelper extends AbstractHelper
{
    public function __invoke($item)
    {
        $output = '';
        if(is_array($item) && $item['data']->getContent()) {
            $params = json_decode($item['data']->getParameters(),true);
            $attrs = json_decode($item['data']->getAttributes(),true);
            $options = json_decode($item['data']->getOptions(),true);
// outer wrapper
            if(array_key_exists('wrapper',$options)) {
                if(array_key_exists('outer',$options['wrapper'])) {
                    // open outer tag
                    $options['wrapper']['outer']['attributes'] =
                        (array_key_exists('attributes',$options['wrapper']['outer']))
                            ? $options['wrapper']['outer']['attributes']
                            : []
                        ;
                    $options['wrapper']['outer']['parameters'] =
                        (array_key_exists('parameters',$options['wrapper']['outer']))
                            ? $options['wrapper']['outer']['parameters']
                            : []
                        ;
                    $output .= $this->getView()->plugin('openTag')(
                        $options['wrapper']['outer']['parameters'],
                        $options['wrapper']['outer']['attributes']
                    );
                }
            }

            $output .= $this->getView()->plugin('openTag')($params,$attrs);

            $content = $item['data']->getContent();
            if(isset($item['content'])) {
                foreach($item['content'] as $childUid => $childData){
                    $placeholder = sprintf("[::content:%s::]",$childData['data']->getUid());
                    $pos = strpos($content,$placeholder);
                    if($pos !== false) {
                       $renderedContent = $this->getView()->plugin('displayContent')($childData);
                       $content = str_replace($placeholder,$renderedContent,$content);
                    }
                }
            }
            $output .= $content;

            $output .= $this->getView()->plugin('closeTag')($params,$attrs);
// outer wrapper
            if(array_key_exists('wrapper',$options)) {
                if(array_key_exists('outer',$options['wrapper'])) {
                    $output .= $this->getView()->plugin('closeTag')(
                        $options['wrapper']['outer']['parameters'],
                        $options['wrapper']['outer']['attributes']
                    );
                }
            }
        }

        return $output;
    }
}
