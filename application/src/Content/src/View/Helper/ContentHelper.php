<?php
namespace Content\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ContentHelper extends AbstractHelper
{
    public function __invoke($item)
    {
        $output = '';

        $output .= $this->getView()->plugin('openTag')($item);

        if(null!==$item->getContent()) {
            foreach($item->getContent() as $childUid => $childData){
                $placeholder = sprintf("[::content:%s::]",$childData->getData()->getUid());
                $pos = strpos($item->getData()->getContent(),$placeholder);
                if($pos !== false) {
                    $renderedContent = $this->getView()->plugin('displayContent')($childData);
//                    var_dump($item->getData()->getContent());
                    $c = str_replace($placeholder,$renderedContent,$item->getData()->getContent());
                    $item->getData()->setContent($c);
//                    var_dump($item->getData());
                }
            }
        }

        $output .= $item->getData()->getContent();

        $output .= $this->getView()->plugin('closeTag')($item);

        return $output;
    }
}
