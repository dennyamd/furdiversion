<?php
return array(
    'controllers' => array(
        'factories' => array(
            'Commission\Controller\Commission' => 'Commission\Factory\CommissionControllerFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'thank_you' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/thank_you',
                    'defaults' => array(
                        'controller' => 'Commission\Controller\Commission',
                        'action' => 'thank_you'
                    )
                )
            ),
            'commission' => array(
                'type' => 'Literal',
                'options' => array(

                    // Change this to something specific to your module
                    'route' => '/commission',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Commission\Controller',
                        'controller' => 'Commission',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(

                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ),
                            'defaults' => array()
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Commission' => __DIR__ . '/../view'
        )
    )
);
