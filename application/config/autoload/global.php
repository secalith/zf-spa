<?php
return [
    'db' => [
        'adapters' => [
            'Application\Db\LocalAdapter' => [
                'driver' => 'Pdo_Sqlite',
                'dsn'    => 'sqlite:./data/database/spa.sqlite',
            ],
        ],
    ],
];