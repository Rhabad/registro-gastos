<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    // "driver" => "Pdo_Mysql",
    // "dsn" => "mysql:host=mydb;dbname=registro_gastos",
    // "username" => "root",
    // "password" => "1234",
    "driver" => "Pdo_Sqlite",
    "dsn" => "sqlite:" . realpath(__DIR__) . "/../../library/registro_gastos",
];
