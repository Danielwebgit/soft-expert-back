<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Define o tipo de conteúdo como JSON
header('Content-Type: application/json');

const DATA_LAYER_CONFIG = [
    "driver" => "pgsql",
    "host" => "localhost",
    "port" => "5432",
    "dbname" => "soft_expert",
    "username" => "root",
    "passwd" => "feras5566",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];

define("URL_BASE", "http://www.softexp.com.test/");