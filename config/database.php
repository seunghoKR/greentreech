<?php
declare(strict_types=1);

return array (
  'driver' => 'mysql',
  'mysql' => 
  array (
    'host' => 'localhost',
    'port' => 3306,
    'database' => 'greentreech',
    'username' => 'greentreech',
    'password' => '#seungho0409',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
  ),
  'sqlite' => 
  array (
    'path' => __DIR__ . '/../storage/database.sqlite',
  ),
  'app' => 
  array (
    'name' => '푸른나무교회',
    'base_url' => '',
    'env' => 'production',
    'upload_dir' => __DIR__ . '/../public/uploads',
    'upload_url' => '/public/uploads',
  ),
);
