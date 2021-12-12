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
        // GET, POST, PUT, DELETE
        // CRUD - Create, Read, Update, Delete
        /*
            Create - POST
            Read - GET
            Update - PUT
            Delete - DELETE
        */

        /*
            /assignments/get/?id=12
            /assignments/edit/?id=12
            /assignments/delete/?id=4
        */

        '/' => [
            'class' => 'Assignments',
            'method' => 'home',
        ],
        '/assignments/get' => [
            'class' => 'Assignments',
            'method' => 'get',
        ],
        '/assignments/add' => [
            'class' => 'Assignments',
            'method' => 'add',
        ],
        '/assignments/delete' => [
            'class' => 'Assignments',
            'method' => 'delete'
        ],
        '/assignments/edit' => [
            'class' => 'Assignments',
            'method' => 'edit'
        ]
    ],


//Names for routes
    'names' => [
        'main' => '/',
        'control' => '/assignments/get',
        'new' => '/assignments/add'
    ],
);