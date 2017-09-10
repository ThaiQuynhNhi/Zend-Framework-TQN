<?php


return Array(
    // 3 phần tử bắt buộc
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Training\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /hello/:controller/:action
            'training' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/training',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Training\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        // bắt buộc phải tuân theo
        'invokables' => array(
            'Training\Controller\Index' => 'Training\Controller\IndexController',
            'Training\Controller\Config' => 'Training\Controller\ConfigController',
        ),
    ),
    'view_manager'       => array(
        // bắt buộc phải tuân theo
        'template_path_stack' => array(
            // ta ở training và muốn vào view (view để display hết ra)
            __DIR__ . '../../view'
        )
    ),
);
