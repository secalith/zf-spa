<?php
namespace Common\View\Helper;

use Zend\View\Helper\AbstractHelper;

class CloseTagHelper extends AbstractHelper
{
    public function __invoke($parameters, $attributes)
    {
        $output = '';
        if(array_key_exists('html_tag',$parameters)
            && ! in_array($parameters['html_tag'],['img'])) {
            $output = sprintf('</%s>',$parameters['html_tag']);
        }

        return $output;
    }
}
