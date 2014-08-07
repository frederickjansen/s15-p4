<?php

return [
    'simple_annotations' => false,

    'metadata' => [
        base_path('app/models')
    ],

    'proxy' => [
        'auto_generate' => true,
        'directory'     => 'C:\Users\Frederick\AppData\Local\Temp',
        'namespace'     => null
    ],

    // Available: null, apc, xcache, redis, memcache
    'cache_provider' => null,

    'cache' => [
        'redis' => [
            'host'     => '127.0.0.1',
            'port'     => 6379,
            'database' => 1
        ],
        'memcache' => [
            'host' => '127.0.0.1',
            'port' => 11211
        ]
    ],

    'repository' => 'Doctrine\ORM\EntityRepository',

    'logger' => null
];
