<?php

namespace Core\Database;

 use Medoo\Medoo;

 class DatabaseManager
 {
     private $connection;

     public function  __construct()
     {
         $this->connection = new Medoo([
             'database_type' => 'example_type',
             'database_name' => 'example_database',
             'server' => 'localhost',
             'username' => 'example123',
             'password' => 'example123'
         ]);
     }

     public function getConnection():Medoo
     {
         return $this->connection;
     }
 }

