<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

const DB_HOST = "localhost";
const DB_NAME = "php_project";
const DB_USER = "user";
const DB_PASS = "user";

const ROOT = "http://localhost/php-project-school/public";
const ROUTE = "/php-site-school/public/";

$bcryptOptions = [
    'cost' => 12,
];
