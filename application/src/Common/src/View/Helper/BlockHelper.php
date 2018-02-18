<?php
namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;

class BlockHelper extends AbstractHelper
{
    public function __invoke($item)
    {
        $output = '';
        if(is_array($item)) {

            $params = json_decode($item['data']->getParameters(),true);
            $attrs = json_decode($item['data']->getAttributes(),true);
            $options = json_decode($item['data']->getOptions(),true);
            // outer
            if(array_key_exists('wrapper',$options)) {
                if(array_key_exists('outer',$options['wrapper'])) {
                    $output .= $this->getView()->plugin('openTag')(
                        $options['wrapper']['outer']['parameters'],
                        $options['wrapper']['outer']['attributes']
                     );
                }
            }
            if( ! empty($params) && ! empty($attrs)){
                $output .= $this->getView()->plugin('openTag')($params,$attrs);
            }
            // inner
            if(array_key_exists('wrapper',$options)) {
                if(array_key_exists('inner',$options['wrapper'])) {
                    $output .= $this->getView()->plugin('openTag')(
                        $options['wrapper']['inner']['parameters'],
                        $options['wrapper']['inner']['attributes']
                    );
                }
            }
            // content
            if( array_key_exists('content',$item) && ! empty($item['content'])){
                foreach($item['content'] as $content) {
                    $output .= $this->getView()->plugin('displayContent')($content);
                }
            }
            // block
            if( array_key_exists('block',$item) && ! empty($item['block'])){
                foreach($item['block'] as $block) {
                    if(array_key_exists('data',$block)){
                        $output .= $this->getView()->plugin('displayBlock')($block);
                    }
                }
            }


//            $content = $item['data']->getContent();
//            var_dump(array_key_exists('block',$item));
//            echo '<pre>';
//            var_dump($item);
//            echo '</pre>';
            if(array_key_exists('block',$item) && ! empty($item['block'])&&1==4){
                foreach($item['block'] as $childData) {
//                    var_dumP($childData);
//                    var_dump(isset($childData['content']));
                    if(isset($childData['content'])){
                        foreach($childData['content'] as $contentchildData) {
//                            var_dump($contentchildData);
//                            $content .= $this->getView()->plugin('displayContent')($contentchildData);
                        }
                    }

//                    foreach($childData['content'] as $childUid => $childData){
//                    echo $childData->getUid();
//                        echo 'parent: '.$item['data']->getUid().' child: '.$childData['data']->getUid().'<br />';
                        $placeholder = sprintf("[::block:%s::]",$childData['data']->getUid());
                        $pos = strpos($item['data']->getContent(),$placeholder);
//                    echo $childData['data']->getUid();
                        if($pos !== false) {
                            echo $renderedContent = $this->getView()->plugin('displayBlock')($childData['data']);
                            $content .= str_replace($placeholder,$renderedContent,$content);
                        }
//                    }
                }
            }


//            $output .= $content;
            $output .= $this->getView()->plugin('closeTag')($params,$attrs);
            if(array_key_exists('wrapper',$options)) {
                if(array_key_exists('inner',$options['wrapper'])) {
                    $output .= $this->getView()->plugin('closeTag')(
                        $options['wrapper']['inner']['parameters'],
                        $options['wrapper']['inner']['attributes']
                    );
                }
            }
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
