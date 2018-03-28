<?php
return [
    'db' => [
        'adapters' => [
            'Application\Db\LocalAdapter' => [
                'driver' => 'Pdo_Sqlite',
                'dsn'    => 'sqlite:./data/database/spa.sqlite',
            ],
            'Application\Db\DatabaseAdapter' => [
                'driver' => 'Pdo',
                'dsn'    => 'mysql:dbname=spa_app;host=kj36968-001.dbaas.ovh.net;port=35266;',
                'username' => 'spa_dev',
                'password' => 'EchCovIlbonesE7'
            ],
            'Application\Db\UserDatabaseAdapter' => [
                'driver' => 'Pdo_Mysql',
                'dsn'    => 'mysql:dbname=spa_user;host=kj36968-001.dbaas.ovh.net;port=35266;',
                'username' => 'spa_dev',
                'password' => 'EchCovIlbonesE7'
            ],
        ],
    ],
];