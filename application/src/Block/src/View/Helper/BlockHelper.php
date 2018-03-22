<?php
namespace Block\View\Helper;

use Zend\View\Helper\AbstractHelper;

class BlockHelper extends AbstractHelper
{
    /**
     * @param \Common\View\Model\ViewModel $item
     * @return string
     */
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

        if( ! empty($item->getForms())){
            /* @var $block \Block\Model\BlockModel*/
            foreach($item->getForms() as $form) {
//                $f = new $form();
//                $form->prepare();
//                var_dumP(($form));
                $output .= $this->getView()->plugin('partial')('app::partial',['form'=>$form]);
//                $r = $this->getView()->plugin('form');
//                var_dump($this->getView()->plugin('form'));
//                $r = $this->getView()->form();
//                var_dump(get_class($this->getView()->formCollection()));
//                var_dumP($f);
//                echo $f->getName();
//                $output .= $this->getView()->plugin('form')->render($f);
//                $output .= $this->getView()->plugin('form')->closeTag($f);
//                $output .= $this->getView()->plugin('form')($f);
            }
        }

        $output .= $this->getView()->plugin('closeTag')($item);

        return $output;
    }
}
