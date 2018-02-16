<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'form_elements' => [
        'spec' => [
            'block_collection' => [
                'name'=>'block_collection',
                'type' => 'Zend\Form\Form',
                'attributes' => [
                    'method' => 'post',
                    'action'=>'/block/create'
                ],
                'fieldsets' => array(
                    0 => [
                        'spec' => array(
                            'name' => 'blocks',
                            'type' => 'Zend\\Form\\Element\\Collection',
                            'hydrator' => 'Zend\\Hydrator\\ClassMethods',
                            'object' => 'Zend\\Form\\Fieldset',
                        ),
                        'input_filter' => [],
                    ],
                ),
                'input_filter' => [],
            ],
        ],
    ],
);
