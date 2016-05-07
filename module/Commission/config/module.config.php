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
                'type' => 'Segment',
                'options' => array(
                    'route' => '/thank_you[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
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
