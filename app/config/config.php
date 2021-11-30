<?php


return $config = array(
//Database
    'database' => [
        'host' => 'localhost',
        'user' => 'dummdevka',
        'password' => 'admin123',
        'db' => 'vg_assignments_tracker',
        'port' => 5432
    ],


//Routes
    'routes' => [
        
        '/assignments/get' => [
            'class' => 'Assignments',
            'method' => 'get',
        ],
        '/assignments/add' => [
            'class' => 'Assignments',
            'method' => 'add',
        ],
        '/' => [
            'class' => 'Assignments',
            'method' => 'home',
        ],
        '/delete' => [
            'class' => 'Assignments',
            'method' => 'delete'
        ],
        '/add' => [
            'class' => 'Assignments',
            'method' => 'add'
        ]
    ],


//Names for routes
    'names' => [
        'main' => '/',
        'control' => '/assignments/get',
        'new' => '/assignments/add'
    ],
);