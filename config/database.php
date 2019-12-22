<?php

return [

  'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [



        'mysql' => [
          'driver'    => 'mysql',
          'host'      => env('DB_HOST', 'localhost'),
          'port'      => env('DB_PORT', 3306),
          'database'  => env('DB_DATABASE', 'forge'),
          'username'  => env('DB_USERNAME', 'forge'),
          'password'  => env('DB_PASSWORD', ''),
          'charset'   => env('DB_CHARSET', 'utf8'),
          'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
          'prefix'    => env('DB_PREFIX', ''),
          'timezone'  => env('DB_TIMEZONE', '+00:00'),
          'strict'    => env('DB_STRICT_MODE', false),
        ],



    ],
  'redis' => [
    'client' => 'predis',
    'default' => [
      'host' => env('REDIS_HOST', 'localhost'),
      'password' => env('REDIS_PASSWORD', null),
      'port' => env('REDIS_PORT', 6379),
      'database' => 0,
      'read_write_timeout' => 60,
    ]
  ]
];
