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
            'CombatSkills',
            'HackSkills',
            'HeroAmount',
            'Heroes',
            'User',
            'Applications',
        ],

        'Web' => [

        ],
    ]
];
