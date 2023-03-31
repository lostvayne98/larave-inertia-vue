<?php
return [
    'path' => base_path() . '/app/Modules',
    'base_namespace' => 'App\Modules',
    'groupWithoutPrefix' => 'Crm',

    'groupMidleware' => [
        'Admin' => [
            'web' => ['auth'],
            'api' => ['auth:api'],
        ]
    ],

    'modules' => [
        'Admin' => [
            'Admin',
            'Skills',
            'HeroAmount',
            'Heroes',
            'User',
            'Applications',
        ],

        'Web' => [

        ],
    ]
];
