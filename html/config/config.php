<?php

ini_set('display_errors', 1);

define('USER', 'root');
define('PW', 'secret');
define('HOST', 'db');
define('DBNAME', 'reviewer');
define('DSN', 'mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8');

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/../lib/Model.php');

session_start();
