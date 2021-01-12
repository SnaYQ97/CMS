<?php
    $config = [
        'Signin' => [
            'login' => [
                'headerPath' => 'template/header',
                'viewPath' => 'signin',
                'header' => [
                    'scripts' => [
                        'assets/scripts/jquery/js/jquery.min.js',
                        //'vendor/bootstrap/js/bootstrap.bundle.min.js',
                        //'vendor/jquery-easing/jquery.easing.min.js',
                        'assets/scripts/js/index.js',
                    ],
                    'defers' => [
                        //'assets/build/js/sb-admin-2.min.js',
                    ],
                    'styles' => [
                        'assets/styles/css/style.min.css',
                    ],
                    'fonts' => [
                        'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&display=swap',
                    ],
                    
                    'title' => 'CMS - Sign in',
                ],
                'content' => [
                    'header' => 'Sign in', 
                    'text' => 'Welcome in your own CMS',
                    'form' => [
                        'type' => 'login',
                        'action' => 'signin/login',
                        'parameters' => [
                            'class' => 'class="signin-form"',
                        ]
                    ],
                    //'inputs' => 
                    'buttons' => [
                        'signin' => TRUE,
                        'back' => FALSE,
                    ]
                ]
            ],
            'welcomeback' => [
                'headerPath' => 'template/header',
                'viewPath' => 'signin',
                'header' => [
                    'scripts' => [
                        'assets/scripts/jquery/js/jquery.min.js',
                        'assets/scripts/js/index.js',
                    ],
                    /* 'defers' => [
                        'assets/build/js/sb-admin-2.min.js',
                    ], */
                    'styles' => [
                        'assets/styles/css/style.min.css'
                    ],
                    'fonts' => [
                        'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&display=swap',
                    ],
                    
                    'title' => 'CMS - Sign in',
                ],
                'content' => [
                    'header' => 'Welcome back', 
                    'text' => 'Good to see you again', //+name of user from controller
                    'form' => [
                        'type' => 'login',
                        'action' => 'signin/login',
                        'parameters' => [
                            'class' => 'class="signin-form"',
                        ]
                    ],
                    //'inputs' => 
                    'buttons' => [
                        'signin' => TRUE,
                        'back' => TRUE,
                    ]
                ]
                
            ],
        ]
    ];