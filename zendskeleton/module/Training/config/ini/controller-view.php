<?php
return array(
    'controllers' => array(
        // bắt buộc phải tuân theo
        'invokables' => array(
            'Training\Controller\Index' => 'Training\Controller\IndexController',
            'Training\Controller\Config' => 'Training\Controller\ConfigController',
        ),
    ),
    'view_manager'       => array(
        // bắt buộc phải tuân theo
        'template_path_stack' => array(__DIR__ . '/../../view'
        )
    ),
);