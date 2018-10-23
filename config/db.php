<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5434;dbname=diaria',
    'username' => 'postgres',
    'password' => 'jorginho',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'public'
        ],
    ]
    /* 'class' => 'yii\db\Connection',
       'dsn' => 'sqlsrv:Server=10.2.8.86;Database=BD_ADAB_REDA', //maybe other dbms such as psql,...
       'username' => 'usr_adab_reda',
       'password' => '%sr_@d@b_rd@',
       'charset' => 'utf8'
    */
];