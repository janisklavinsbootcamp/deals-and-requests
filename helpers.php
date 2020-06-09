<?php


use Core\Database\DatabaseManager;
use Medoo\Medoo;

function database(): Medoo
{
    return (new DatabaseManager())->getConnection();
}